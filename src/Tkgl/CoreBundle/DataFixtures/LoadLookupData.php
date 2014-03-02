<?php

namespace Tkgl\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Tkgl\CoreBundle\Entity\AddressType;
use Tkgl\CoreBundle\Entity\PhoneNumberType;
use Tkgl\CoreBundle\Entity\EmailAddressType;

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
    
    //address types
    $addressType = new AddressType();
    $addressType->setName(AddressType::HOME);
    $manager->persist($addressType);    
    $addressType = new AddressType();
    $addressType->setName(AddressType::WORK);
    $manager->persist($addressType);    
    $addressType = new AddressType();
    $addressType->setName(AddressType::PHYSICAL);
    $manager->persist($addressType);    
    $addressType = new AddressType();
    $addressType->setName(AddressType::POSTAL);
    $manager->persist($addressType);    
    $addressType = new AddressType();
    $addressType->setName(AddressType::OTHER);
    $manager->persist($addressType);
    
    //phone number types
    $phoneNumberType = new PhoneNumberType();
    $phoneNumberType->setName(PhoneNumberType::HOME);
    $manager->persist($phoneNumberType);
    $phoneNumberType = new PhoneNumberType();
    $phoneNumberType->setName(PhoneNumberType::WORK);
    $manager->persist($phoneNumberType);
    $phoneNumberType = new PhoneNumberType();
    $phoneNumberType->setName(PhoneNumberType::MOBILE);
    $manager->persist($phoneNumberType);
    $phoneNumberType = new PhoneNumberType();
    $phoneNumberType->setName(PhoneNumberType::Fax);
    $manager->persist($phoneNumberType);
    $phoneNumberType = new PhoneNumberType();
    $phoneNumberType->setName(PhoneNumberType::OTHER);
    $manager->persist($phoneNumberType);
    
    //email address types
    $emailAddressType = new EmailAddressType();
    $emailAddressType->setName(EmailAddressType::HOME);
    $manager->persist($emailAddressType);
    $emailAddressType = new EmailAddressType();
    $emailAddressType->setName(EmailAddressType::WORK);
    $manager->persist($emailAddressType);
    $emailAddressType = new EmailAddressType();
    $emailAddressType->setName(EmailAddressType::PERSONAL);
    $manager->persist($emailAddressType);
    $emailAddressType = new EmailAddressType();
    $emailAddressType->setName(EmailAddressType::OTHER);
    $manager->persist($emailAddressType);
    
    
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