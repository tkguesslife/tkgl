<?php
namespace Tkgl\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Tkgl\UserBundle\Entity\User;
use Tkgl\CoreBundle\Entity\Person;
use Tkgl\UserBundle\Form\UserType as UserFormType;

/**
 * Handles system user management
 * 
 * @Route("/user-management")
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class UserController extends Controller {
  
  
   /**
   * Display list of user's companies
   *
   * @Route("/manage", name="user_manage")
   * @Method("GET")
   * @Template("TkglUserBundle:user:manage.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function manageUsers(){
    
    return array();
  }
  
   /**
   * Display list of user's companies
   *
   * @Route("/new", name="user_new")
   * @Method({"GET", "POST"})
   * @Template("TkglUserBundle:user:new.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function newUser(Request $request){
    
    $newUser = new User();
    $newPerson = new Person();
    $newUser->setPerson($newPerson);
    
    $newUserForm = $this->createForm(new UserFormType(),  $newUser);
    
    
    return array('userForm' => $newUserForm->createView());
  }
  
}
