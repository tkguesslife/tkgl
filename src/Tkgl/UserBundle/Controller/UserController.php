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
    $arrUsers = $this->getDoctrine()->getRepository('TkglUserBundle:User')->findAll();
      
      
    return array('users' => $arrUsers);
  }
  
   /**
   * Display list of users in a team
   *
   * @Route("/{teamId}/team", name="team_users")
   * @Method("GET")
   * @Template("TkglUserBundle:user:_list.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function teamUsers($teamId){
    $objTeam = $this->getDoctrine()->getRepository('TkglUserBundle:UserTeam')->find($teamId);    
      
    return array('users' => $objTeam->getTeamUsers());
  }
  
  
  
   /**
   * Display new user form
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
    
    if($request->getMethod() == 'POST'){
        $newUserForm->handleRequest($request);
        if($newUserForm->isValid()){
            $manager = $this->getDoctrine()->getManager();
            
            $manager->persist($newUser);
            $manager->flush();
        }
    }
    return array('userForm' => $newUserForm->createView());
  }
  
   /**
   * Display edit user form
   *
   * @Route("/{intUserId}/edit", name="user_edit")
   * @Method({"GET", "POST"})
   * @Template("TkglUserBundle:user:edit.html.twig")
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function editUser($intUserId, Request $request){     
    $manager = $this->getDoctrine()->getManager();
    $objUser = $manager->getRepository('TkglUserBundle:User')->find($intUserId);    
    
    $userForm = $this->createForm(new UserFormType(),  $objUser);    
    if($request->getMethod() == 'POST'){
        $userForm->handleRequest($request);
        if($userForm->isValid()){
            
            
            $manager->persist($userForm);
            $manager->flush();
        }
    }
    return array('userForm' => $userForm->createView()
            , 'user' => $objUser);
  }
  
}
