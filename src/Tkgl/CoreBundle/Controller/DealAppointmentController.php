<?php

namespace Tkgl\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Tkgl\CoreBundle\Form\DealAppointmentType as DealAppointmentForm;

/**
 * Description of DealAppointmentController
 * @Route("/deal-appointment")
 * @author Tiko Banyini <tiko@falcorp.co.za>
 */
class DealAppointmentController extends Controller {

  /**
   * Add new deal appointment
   *
   * @Route("/{dealId}/new", name="deal_appointment_new")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:dealAppointment:_new.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function newAppointmentAction($dealId, Request $request) {
    $objDeal = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->find($dealId);
    $newDealAppointment = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:DealAppointment')->createNew($this->getUser());
    $newDealAppointment->setDeal($objDeal);
    $dealAppointmentForm = $this->createForm(new DealAppointmentForm(), $newDealAppointment);

    if ($request->getMethod() == 'POST') {
      $dealAppointmentForm->handleRequest($request);
      if ($dealAppointmentForm->isValid()) {
        
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($newDealAppointment);
        $manager->flush();
        
        $arrResponse['success'] = true;
        $arrResponse['action'] = 'saveAppointment';
        $arrResponse['strFlashMessage'] = "Appointment saved successfully.";
        return new JsonResponse($arrResponse);
      }
    }
    return array('dealAppointmentForm' => $dealAppointmentForm->createView(), 'deal' => $objDeal);
  }

  /**
   * Add new deal appointment
   *
   * @Route("/{dealAppointmentId}/edit", name="deal_appointment_edit")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:dealAppointment:_edit.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function editAppointmentAction($dealAppointmentId, Request $request) {
    $dealAppointment = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:DealAppointment')->find($dealAppointmentId);
    $objDeal = $dealAppointment->getDeal();
    
    $dealAppointmentForm = $this->createForm(new DealAppointmentForm(), $dealAppointment);

    if ($request->getMethod() == 'POST') {
      $dealAppointmentForm->handleRequest($request);
      if ($dealAppointmentForm->isValid()) {
        
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($dealAppointment);
        $manager->flush();
        
        $arrResponse['success'] = true;
        $arrResponse['action'] = 'editAppointment';
        $arrResponse['strFlashMessage'] = "Appointment saved successfully.";
        return new JsonResponse($arrResponse);
      }
    }
    return array('dealAppointmentForm' => $dealAppointmentForm->createView()
            , 'deal' => $objDeal
            , 'dealAppointment' => $dealAppointment
            );
  }

  /**
   * List deal appointments
   *
   * @Route("/{dealId}/list", name="deal_appointment_list")
   * @Method("GET")
   * @Template("TkglCoreBundle:dealAppointment:_list.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function listDealAppointmentAction($dealId, Request $request) {
    $objDeal = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->find($dealId);
    
    return array('dealAppointments' => $objDeal->getDealAppointments(), 'deal' => $objDeal);
  }

}
