<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=50, nullable=true)   
   */
  protected $title;

  /**
   * @ORM\Column(type="string", length=50, nullable=true)   
   */
  protected $gender;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $firstName;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $secondName;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $lastName;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $companyName;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $idnumber;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)      * 
   */
  protected $passportNumber;
  
  /**
   * @ORM\OneToMany(targetEntity="Tkgl\CoreBundle\Entity\PersonAddress", mappedBy="person", cascade={"persist"})
   */
  protected $personAddress;
  
  /**
   * @ORM\OneToMany(targetEntity="Tkgl\CoreBundle\Entity\PersonPhoneNumber", mappedBy="person", cascade={"persist"})
   */
  protected $personPhoneNumbers;

  
  public function __toString() {
      return $this->getFirstName().'  '.$this->getLastName();
  }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personAddress = new \Doctrine\Common\Collections\ArrayCollection();
        $this->personPhoneNumbers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Person
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set secondName
     *
     * @param string $secondName
     * @return Person
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get secondName
     *
     * @return string 
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return Person
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set idnumber
     *
     * @param string $idnumber
     * @return Person
     */
    public function setIdnumber($idnumber)
    {
        $this->idnumber = $idnumber;

        return $this;
    }

    /**
     * Get idnumber
     *
     * @return string 
     */
    public function getIdnumber()
    {
        return $this->idnumber;
    }

    /**
     * Set passportNumber
     *
     * @param string $passportNumber
     * @return Person
     */
    public function setPassportNumber($passportNumber)
    {
        $this->passportNumber = $passportNumber;

        return $this;
    }

    /**
     * Get passportNumber
     *
     * @return string 
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * Add personAddress
     *
     * @param \Tkgl\CoreBundle\Entity\personAddress $personAddress
     * @return Person
     */
    public function addPersonAddress(\Tkgl\CoreBundle\Entity\personAddress $personAddress)
    {
        $this->personAddress[] = $personAddress;

        return $this;
    }

    /**
     * Remove personAddress
     *
     * @param \Tkgl\CoreBundle\Entity\personAddress $personAddress
     */
    public function removePersonAddress(\Tkgl\CoreBundle\Entity\personAddress $personAddress)
    {
        $this->personAddress->removeElement($personAddress);
    }

    /**
     * Get personAddress
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonAddress()
    {
        return $this->personAddress;
    }

    /**
     * Add personPhoneNumbers
     *
     * @param \Tkgl\CoreBundle\Entity\personPhoneNumber $personPhoneNumbers
     * @return Person
     */
    public function addPersonPhoneNumber(\Tkgl\CoreBundle\Entity\personPhoneNumber $personPhoneNumbers)
    {
        $this->personPhoneNumbers[] = $personPhoneNumbers;

        return $this;
    }

    /**
     * Remove personPhoneNumbers
     *
     * @param \Tkgl\CoreBundle\Entity\personPhoneNumber $personPhoneNumbers
     */
    public function removePersonPhoneNumber(\Tkgl\CoreBundle\Entity\personPhoneNumber $personPhoneNumbers)
    {
        $this->personPhoneNumbers->removeElement($personPhoneNumbers);
    }

    /**
     * Get personPhoneNumbers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonPhoneNumbers()
    {
        return $this->personPhoneNumbers;
    }
}
