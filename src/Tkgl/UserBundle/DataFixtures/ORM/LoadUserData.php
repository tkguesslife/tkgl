<?php

namespace Tkgl\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Tkgl\CoreBundle\Entity\Person;
use Tkgl\UserBundle\Entity\User;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;



/**
 * Description of LoadUserData
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

  /**
   * @var ContainerInterface
   */
  private $container;

  /**
   * {@inheritDoc}
   */
  public function setContainer(ContainerInterface $container = null) {
    $this->container = $container;
  }

  /**
   * {@inheritDoc}
   */
  public function load(ObjectManager $manager) {
    
    //Administrator User    
    $person = new Person();        
    $person->setFirstname('System');
    $person->setLastname('Admin');
    $manager->persist($person);
    $userAdmin = new User();
    $userAdmin->setUsername('admin');
    $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($userAdmin)
    ;    
    $userAdmin->setPassword($encoder->encodePassword('admin', $userAdmin->getSalt()));
    $userAdmin->setEmail('admin@tkbean.co.za');
    $userAdmin->setEnabled(true);
    $userAdmin->setRoles(array('ROLE_ADMIN'));
    $userAdmin->setPerson($person);
    $manager->persist($userAdmin);
     
    $manager->flush();
    
    $this->addReference('admin-user', $userAdmin);    
    
    
  }  
  
  

  /**
   * {@inheritDoc}
   */
  public function getOrder() {
    return 10;
  }

}



?>