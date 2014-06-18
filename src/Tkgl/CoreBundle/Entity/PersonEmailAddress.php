<?php
namespace Tkgl\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="person_email_address")
 * @ORM\HasLifecycleCallbacks
 */
class PersonEmailAddress extends BaseAuditableEntity {
  
  
    /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
    /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Person", inversedBy="personEmailAddresses")
   * @ORM\JoinColumn(name="person_id", referencedColumnName="id")     
   */
  protected $person;
  
  
  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\EmailAddressType")
   * @ORM\JoinColumn(name="email_address_type_id", referencedColumnName="id")
   */
  protected $emailAddressType;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $emailAddress;
  
  public function __toString() {
    return $this->getEmailAddress();
  }
  
  


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
     * Set person
     *
     * @param \Tkgl\CoreBundle\Entity\Person $person
     * @return PersonEmailAddress
     */
    public function setPerson(\Tkgl\CoreBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Tkgl\CoreBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }

   

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return PersonEmailAddress
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
     * @return PersonEmailAddress
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
        parent::doStuffOnPrePersist();
    }

    /**
     * @ORM\PreUpdate
     */
    public function doStuffOnPreUpdate()
    {
        parent::doStuffOnPreUpdate();
    }
}
