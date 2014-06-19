<?php

namespace Tkgl\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Tkgl\CoreBundle\Entity\Deal;
use Tkgl\CoreBundle\Form\DealType;

/**
 * Handles  deal management
 * 
 * @Route("/deal")
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class DealController extends Controller {

  /**
   * Add new deal
   *
   * @Route("/new", name="deal_new")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:deal:new.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function newDeal(Request $request) {
    $objDeal = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->getNewDealWithDefaults($this->getUser());    

    $dealForm = $this->createForm(new DealType(), $objDeal);

    if ($request->getMethod() == 'POST') {
      $dealForm->handleRequest($request);
      if ($dealForm->isValid()) {
        
        foreach ($objDeal->getPerson()->getPersonEmailAddresses() as $personEmail) {
          $personEmail->setPerson($objDeal->getPerson());
          $personEmail->setCreatedBy($this->getUser());
        }

        foreach ($objDeal->getPerson()->getPersonPhoneNumbers() as $personPhone) {
          $personPhone->setPerson($objDeal->getPerson());
          $personPhone->setCreatedBy($this->getUser());
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($objDeal);
        $manager->flush();
        $arrResponse['success'] = true;
        $arrResponse['action'] = 'addDeal';
        $arrResponse['strFlashMessage'] = "deal added successfully.";
        return new JsonResponse($arrResponse);
      }
    }

    return array('dealForm' => $dealForm->createView());
  }

  /**
   * Add new deal
   *
   * @Route("/{dealId}/edit", name="deal_edit")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:deal:edit.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function editDeal($dealId, Request $request) {
    $objDeal = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->find($dealId);

    $dealForm = $this->createForm(new DealType(), $objDeal);

    if ($request->getMethod() == 'POST') {
      $dealForm->handleRequest($request);
      if ($dealForm->isValid()) {
        foreach ($objDeal->getPerson()->getPersonEmailAddresses() as $personEmail) {
          $personEmail->setPerson($objDeal->getPerson());
          $personEmail->setCreatedBy($this->getUser());
        }

        foreach ($objDeal->getPerson()->getPersonPhoneNumbers() as $personPhone) {
          $personPhone->setPerson($objDeal->getPerson());
          $personPhone->setCreatedBy($this->getUser());
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($objDeal);
        $manager->flush();
        $arrResponse['success'] = true;
        $arrResponse['action'] = 'editDeal';
        $arrResponse['strFlashMessage'] = "deal edited successfully.";
        return new JsonResponse($arrResponse);
      }
    }

    return array('dealForm' => $dealForm->createView(), 'deal' => $objDeal);
  }

  /**
   * Display manage teams view
   *
   * @Route("/manage", name="deal_manage")
   * @Method("GET")
   * @Template("TkglCoreBundle:deal:manage.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function manageDeals() {
    $deals = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->findAll();
    return array('deals' => $deals);
  }

  /**
   * Display deal list
   *
   * @Route("/list", name="deal_list")
   * @Method("GET")
   * @Template("TkglCoreBundle:deal:_list.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function getInstitutionList() {
    $deals = $this->getDoctrine()->getRepository('TkglCoreBundle:Deal')->findAll();
    return array('deals' => $deals);
  }
  
  /**
   * Display deal interaction
   *
   * @Route("/{dealId}/interaction", name="deal_interaction")
   * @Method("GET")
   * @Template("TkglCoreBundle:deal:interaction.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function interaction($dealId){
    $objDeal = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->find($dealId);
    
    return array('deal'=>$objDeal);
  }

}
