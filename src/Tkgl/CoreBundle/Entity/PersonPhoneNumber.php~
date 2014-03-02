<?php
namespace Tkgl\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="personPhoneNumber")
 */
class PersonPhoneNumber extends BaseAuditableEntity  {
  
  
    /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
    /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Person", inversedBy="personPhoneNumbers")
   * @ORM\JoinColumn(name="personId", referencedColumnName="id")     
   */
  protected $person;
  
  /** 
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\PhoneNumber")
   * @ORM\JoinColumn(name="phoneNumberId", referencedColumnName="id")   
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
     * Set person
     *
     * @param \Tkgl\CoreBundle\Entity\Person $person
     * @return PersonPhoneNumber
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
     * Set phoneNumber
     *
     * @param \Tkgl\CoreBundle\Entity\PhoneNumber $phoneNumber
     * @return PersonPhoneNumber
     */
    public function setPhoneNumber(\Tkgl\CoreBundle\Entity\PhoneNumber $phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return \Tkgl\CoreBundle\Entity\PhoneNumber 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
