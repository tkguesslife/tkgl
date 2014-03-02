<?php

namespace Tkgl\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
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

?>dividual->setName('Individual');
    $manager->persist($contactTypeIndividual);
    
    $contactTypeCompany = new ContactType();
    $contactTypeCompany->setName('Company');
    $manager->persist($contactTypeCompany);
    
    $contactTypeOrganisation = new ContactType();
    $contactTypeOrganisation->setName('Organisation');
    $manager->persist($contactTypeOrganisation);
    
    $contactTypeGroup = new ContactType();
    $contactTypeGroup->setName('Group');    
    $manager->persist($contactTypeGroup);   
    
    $contactTypeGroup = new ContactType();
    $contactTypeGroup->setName('Trust');    
    $manager->persist($contactTypeGroup);   
    
    
    $manager->flush();
    
    $this->addReference('contact-type-individual', $contactTypeIndividual);
    $this->addReference('contact-type-company', $contactTypeCompany);
    $this->addReference('contact-type-organisation', $contactTypeOrganisation);
    $this->addReference('contact-type-group', $contactTypeGroup);
    
  }

   /**
   * {@inheritDoc}
   */
  public function getOrder() {
    return 1;
  }

  

}

?>