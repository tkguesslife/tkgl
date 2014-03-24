<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="emailAddress", options={"comment" = "Stores email addresses"})
 * @ORM\HasLifecycleCallbacks
 */
class EmailAddress extends BaseAuditableEntity {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  
  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\EmailAddressType")
   * @ORM\JoinColumn(name="emailAddressTypeId", referencedColumnName="id")
   */
  protected $emailAddressType;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $emailAddress;

   

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
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return EmailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set emailAddressType
     *
     * @param \Tkgl\CoreBundle\Entity\EmailAddressType $emailAddressType
     * @return EmailAddress
     */
    public function setEmailAddressType(\Tkgl\CoreBundle\Entity\EmailAddressType $emailAddressType = null)
    {
        $this->emailAddressType = $emailAddressType;

        return $this;
    }

    /**
     * Get emailAddressType
     *
     * @return \Tkgl\CoreBundle\Entity\EmailAddressType 
     */
    public function getEmailAddressType()
    {
        return $this->emailAddressType;
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
