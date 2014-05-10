<?php
namespace Tkgl\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="person_email_address")
 */
class PersonEmailAddress extends BaseAuditableEntity {
  
  
    /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
    /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Person", inversedBy="personAddress")
   * @ORM\JoinColumn(name="person_id", referencedColumnName="id")     
   */
  protected $person;
  
  /** 
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\EmailAddress")
   * @ORM\JoinColumn(name="address_id", referencedColumnName="id")   
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
     * @param \Tkgl\CoreBundle\Entity\EmailAddress $emailAddress
     * @return PersonEmailAddress
     */
    public function setEmailAddress(\Tkgl\CoreBundle\Entity\EmailAddress $emailAddress = null)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return \Tkgl\CoreBundle\Entity\EmailAddress 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
}
