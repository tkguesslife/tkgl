<?php

namespace Tkgl\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Tkgl\UserBundle\Entity\UserTeam;
use Tkgl\UserBundle\Form\UserTeamType;

/**
 * Handles  user team management
 * 
 * @Route("/team-management")
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class UserTeamController extends Controller {

    /**
     * Display manage teams view
     *
     * @Route("/manage", name="team_manage")
     * @Method("GET")
     * @Template("TkglUserBundle:userTeam:manage.html.twig")
     * @author Tiko Banyini <admin@tkbean.co.za>
     */
    public function manageTeams() {
        return array();
    }
    
    
    /**
     * Display list of teams
     *
     * @Route("/list", name="team_list")
     * @Method("GET")
     * @Template("TkglUserBundle:userTeam:_list.html.twig")
     * @author Tiko Banyini <admin@tkbean.co.za>
     */
    public function getTeamList(){
      $arrTeams = $this->getDoctrine()->getRepository('TkglUserBundle:UserTeam')->findAll();
        return array('teams' => $arrTeams);
    }
    

    /**
     * Add new team
     *
     * @Route("/new", name="team_new")
     * @Method({"GET", "POST"})
     * @Template("TkglUserBundle:userTeam:new.html.twig")
     * @author Tiko Banyini <admin@tkbean.co.za>
     */
    public function newTeam(Request $request) {

        $newTeam = new UserTeam();
        $teamForm = $this->createForm(new UserTeamType(), $newTeam);
        if ($request->getMethod() == 'POST') {
            $teamForm->handleRequest($request);
            if ($teamForm->isValid()) {
                $newTeam->setCreatedBy($this->getUser());
                $em = $this->getDoctrine()->getManager();
                $em->persist($newTeam);
                $em->flush();
                $arrResponse['success'] = true;
                $arrResponse['action'] = 'addUserTeam';
                $arrResponse['strFlashMessage'] = "Team created successfully.";
                return new JsonResponse($arrResponse);
            }
        }


        return array('teamForm' => $teamForm->createView());
    }

    /**
     * Edit User team
     *
     * @Route("/{teamId}/edit", name="team_edit")
     * @Method({"GET", "POST"})
     * @Template("TkglUserBundle:userTeam:edit.html.twig")
     * @author Tiko Banyini <admin@tkbean.co.za>
     */
    public function editUserTeam($teamId, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $userTeam = $em->getRepository('TkglUserBundle:UserTeam')->find($teamId);

        $arrOriginalUsers = $userTeam->getTeamUsers()->toArray();
        $teamForm = $this->createForm(new UserTeamType(), $userTeam);
        if ($request->getMethod() == 'POST') {
            $teamForm->handleRequest($request);
            if ($teamForm->isValid()) {
//              \Tkgl\CoreBundle\Lib\Debug::objectDump($userTeam->getTeamUsers());               
                $arrSelectedUsers = $userTeam->getTeamUsers()->toArray();
                foreach ($arrOriginalUsers as $user) {
                    if (!in_array($user, $arrSelectedUsers)) {
                        $user->removeUserTeam($userTeam);
                        $em->persist($user);
                    }
                }

                foreach ($arrSelectedUsers as $user) {
                    if (!in_array($user, $arrOriginalUsers)) {
                        $user->getUserTeams()->add($userTeam);
                        $em->persist($user);
                    }
                }

                $userTeam->setUpdatedBy($this->getUser());
                $em->persist($userTeam);
                $em->flush();

                $arrResponse['success'] = true;
                $arrResponse['action'] = 'editUserTeam';
                $arrResponse['strFlashMessage'] = "Team updated successfully.";
                return new JsonResponse($arrResponse);
            }
        }

        return array('teamForm' => $teamForm->createView(), 'userTeam' => $userTeam);
    }

}
