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
class DealController  extends Controller{
    
    /**
     * Add new deal
     *
     * @Route("/new", name="deal_new")
     * @Method({"GET", "POST"})
     * @Template("TkglCoreBundle:deal:new.html.twig")
     * @author Tiko Banyini <admin@tkbean.co.za>
     */
    public function newDeal(Request $request){
        $newDeal = new Deal();
        
        $dealForm = $this->createForm(new DealType(), $newDeal );
        
        if($request->getMethod() == 'POST'){
            $dealForm->handleRequest($request);
            if($dealForm->isValid()){
                
            }
        }
        
        return array('dealForm' =>$dealForm->createView());
    }
    
}
