<?php

namespace Tkgl\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use \Tkgl\CoreBundle\Form\InstitutionType as InstitutionForm;
use Tkgl\CoreBundle\Entity\Institution;

/**
 * Handles  user team management
 * 
 * @Route("/institution")
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class InstitutionController extends Controller {

  /**
   * Display manage teams view
   *
   * @Route("/manage", name="institution_manage")
   * @Method("GET")
   * @Template("TkglCoreBundle:institution:manage.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function manageInstitutions() {
    $institutions = $this->getDoctrine()->getRepository('TkglCoreBundle:Institution')->findAll();
    return array('institutions' => $institutions);
  }

  /**
   * Display new user form
   *
   * @Route("/new", name="institution_new")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:institution:new.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function newInstitution(Request $request) {

    $objInstitition = new Institution();
    $objInstitition->setCreatedBy($this->getUser());
    $objInstitionForm = $this->createForm(new InstitutionForm(), $objInstitition);

    if ($request->getMethod() == 'POST') {
      $objInstitionForm->handleRequest($request);
      if ($objInstitionForm->isValid()) {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($objInstitition);
        $manager->flush();
        $arrResponse['success'] = true;
        $arrResponse['action'] = 'addInstitution';
        $arrResponse['strFlashMessage'] = "Institution added successfully.";
        return new JsonResponse($arrResponse);
      }
    }

    return array('institutionForm' => $objInstitionForm->createView());
  }

  /**
   * Display edit institution form
   *
   * @Route("/{institutionId}/edit", name="institution_edit")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:institution:edit.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function editInstitution($institutionId, Request $request) {

    $objInstitition = $this->getDoctrine()->getRepository('TkglCoreBundle:Institution')->find($institutionId);
    $objInstitition->setUpdatedBy($this->getUser());
    $objInstitionForm = $this->createForm(new InstitutionForm(), $objInstitition);

    if ($request->getMethod() == 'POST') {
      $objInstitionForm->handleRequest($request);
      if ($objInstitionForm->isValid()) {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($objInstitition);
        $manager->flush();
        $arrResponse['success'] = true;
        $arrResponse['action'] = 'addInstitution';
        $arrResponse['strFlashMessage'] = "Institution added successfully.";
        return new JsonResponse($arrResponse);
      }
    }

    return array('institution' => $objInstitition, 'institutionForm' => $objInstitionForm->createView());
  }

  /**
   * Display institution list
   *
   * @Route("/list", name="institution_list")
   * @Method("GET")
   * @Template("TkglCoreBundle:institution:_list.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function getInstitutionList() {
    $institutions = $this->getDoctrine()->getRepository('TkglCoreBundle:Institution')->findAll();
    return array('institutions' => $institutions);
  }

}
