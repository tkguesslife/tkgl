<?php
namespace Tkgl\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Tkgl\CoreBundle\Entity\Company;
use Tkgl\CoreBundle\Form\CompanyType;

/**
 * Description of CompanyController
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class CompanyController  extends Controller {
  
  
   /**
   * Display list of user's companies
   *
   * @Route("/company-list", name="company_list")
   * @Method("GET")
   * @Template("TkglCoreBundle:company:_list.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function listAction(){
    
  }
  
  
   /**
   * Display UI for company management
   *
   * @Route("/", name="company_manage")
   * @Method("GET")
   * @Template("TkglCoreBundle:company:manage.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function manageAction(){
    
    return array();
  }
  
   /**
   * Display new company form
   *
   * @Route("/new-company", name="company_new")
   * @Method({"GET", "POS"})
   * @Template("TkglCoreBundle:company:new.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function newAction(Request $request){
    
    $newCompany = new Company();
    $newCompany->setCreatedBy($this->getUser());
    $companyForm = $this->createForm(new CompanyType, $newCompany);    
    $companyForm->handleRequest($request);
    if($companyForm->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($newCompany);
      $em->flush();
      
    }
    
    return array( 'companyForm' => $companyForm->createView());
  }
  
}
