<?php
namespace Tkgl\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="person_address")
 * @ORM\HasLifecycleCallbacks
 */
class PersonAddress extends BaseAuditableEntity {
  
  
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
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Address")
   * @ORM\JoinColumn(name="address_id", referencedColumnName="id")   
   */
  protected $address;
  
  


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
     * @return PersonAddress
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
     * Set address
     *
     * @param \Tkgl\CoreBundle\Entity\Address $address
     * @return PersonAddress
     */
    public function setAddress(\Tkgl\CoreBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Tkgl\CoreBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
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
