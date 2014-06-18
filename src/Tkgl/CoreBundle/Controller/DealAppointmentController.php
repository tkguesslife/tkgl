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
class DealAppointmentController extends Controller{

  /**
   * Add new deal
   *
   * @Route("/{dealId}/new", name="deal_appointment_new")
   * @Method({"GET", "POST"})
   * @Template("TkglCoreBundle:dealAppointment:new.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function newAppointmentAction($dealId){
    $objDeal = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:Deal')->find($dealId);
    $newDealAppointment = $this->getDoctrine()->getManager()->getRepository('TkglCoreBundle:DealAppointment')->createNew($this->getUser());
    $newDealAppointment->setDeal($objDeal);
    $dealAppointmentForm = $this->createForm(new DealAppointmentForm(), $newDealAppointment);
    
    
    return array('dealAppointmentForm' => $dealAppointmentForm->createView());
  }
  
}
