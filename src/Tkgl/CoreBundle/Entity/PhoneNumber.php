<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="phone_number", options={"comment" = "Stores phone numbers"})
 * @ORM\HasLifecycleCallbacks
 */
class PhoneNumber extends BaseAuditableEntity {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  
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
  

   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return PhoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneNumberType
     *
     * @param \Tkgl\CoreBundle\Entity\PhoneNumberType $phoneNumberType
     * @return PhoneNumber
     */
    public function setPhoneNumberType(\Tkgl\CoreBundle\Entity\PhoneNumberType $phoneNumberType = null)
    {
        $this->phoneNumberType = $phoneNumberType;

        return $this;
    }

    /**
     * Get phoneNumberType
     *
     * @return \Tkgl\CoreBundle\Entity\PhoneNumberType 
     */
    public function getPhoneNumberType()
    {
        return $this->phoneNumberType;
    }
    /**
     * @ORM\PrePersist
     */
    public function doStuffOnPrePersist()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function doStuffOnPreUpdate()
    {
        // Add your code here
    }
}
