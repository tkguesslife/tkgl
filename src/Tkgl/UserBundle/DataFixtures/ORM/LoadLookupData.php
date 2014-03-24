<?php

namespace Tkgl\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Tkgl\CoreBundle\Entity\Province;
/**
 * Load Look update
 *
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class LoadLookupData extends AbstractFixture implements OrderedFixtureInterface {
  
   /**
   * {@inheritDoc}
   */
  public function load(ObjectManager $manager) {
    
    
    
  }

   /**
   * {@inheritDoc}
   */
  public function getOrder() {
    return 1;
  }

  

}
