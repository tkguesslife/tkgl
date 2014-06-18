<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="person_phone_number")
 * @ORM\HasLifecycleCallbacks
 */
class PersonPhoneNumber extends BaseAuditableEntity {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Person", inversedBy="personPhoneNumbers")
   * @ORM\JoinColumn(name="person_id", referencedColumnName="id")     
   */
  protected $person;

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\PhoneNumberType")
   * @ORM\JoinColumn(name="phone_number_type_id", referencedColumnName="id")
   */
  protected $phoneNumberType;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="At least one contact info is required.", groups={"contactGroupValidation"})
   */
  protected $phoneNumber;

  public function __toString() {
    return $this->getPhoneNumber();
  }

  /**
   * @ORM\PrePersist
   */
  public function doStuffOnPrePersist() {
    parent::doStuffOnPrePersist();
  }

  /**
   * @ORM\PreUpdate
   */
  public function doStuffOnPreUpdate() {
    parent::doStuffOnPreUpdate();
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set person
   *
   * @param \Tkgl\CoreBundle\Entity\Person $person
   * @return PersonPhoneNumber
   */
  public function setPerson(\Tkgl\CoreBundle\Entity\Person $person = null) {
    $this->person = $person;

    return $this;
  }

  /**
   * Get person
   *
   * @return \Tkgl\CoreBundle\Entity\Person 
   */
  public function getPerson() {
    return $this->person;
  }

  /**
   * Set phoneNumberType
   *
   * @param \Tkgl\CoreBundle\Entity\PhoneNumberType $phoneNumberType
   * @return PersonPhoneNumber
   */
  public function setPhoneNumberType(\Tkgl\CoreBundle\Entity\PhoneNumberType $phoneNumberType = null) {
    $this->phoneNumberType = $phoneNumberType;

    return $this;
  }

  /**
   * Get phoneNumberType
   *
   * @return \Tkgl\CoreBundle\Entity\PhoneNumberType 
   */
  public function getPhoneNumberType() {
    return $this->phoneNumberType;
  }

  /**
   * Set phoneNumber
   *
   * @param string $phoneNumber
   * @return PersonPhoneNumber
   */
  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;

    return $this;
  }

  /**
   * Get phoneNumber
   *
   * @return string 
   */
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

}
