<?php

namespace Tkgl\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="ContactType")
   * @ORM\JoinColumn(name="contactTypeId", referencedColumnName="id")
   */
  protected $contactType;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="Name required.", groups={"contactNameValidation"})
   */
  protected $firstname;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="Name required.", groups={"contactNameValidation"})
   */
  protected $lastname;
  
  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="Name required.", groups={"companyNameValidation"})
   */
  protected $companyName;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $idnumber;

  /**
   * @ORM\OneToOne(targetEntity="ContactDetail", orphanRemoval=true, cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="contactDetailId", referencedColumnName="id")
   */
  protected $contactDetail;

  public function __toString() {
    
    $strName = '';    
    
    if($this->getContactType()->getName() == 'Individual'){
      $strName =  $this->getLastname() . ' ' . $this->getFirstname();
    }else { 
      if(trim($this->getLastname() . $this->getFirstname()) != ''){
        $strName = $this->getLastname() . ' ' . $this->getFirstname(). "({$this->getCompanyName()})";
      }else{
        $strName = $this->getCompanyName();
      }      
    }
    
    return $strName;
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
     * Set firstname
     *
     * @param string $firstname
     * @return Contact
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Contact
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return Contact
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
     * @return Contact
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
     * Set contactType
     *
     * @param \Tkgl\UserBundle\Entity\ContactType $contactType
     * @return Contact
     */
    public function setContactType(\Tkgl\UserBundle\Entity\ContactType $contactType = null)
    {
        $this->contactType = $contactType;

        return $this;
    }

    /**
     * Get contactType
     *
     * @return \Tkgl\UserBundle\Entity\ContactType 
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * Set contactDetail
     *
     * @param \Tkgl\UserBundle\Entity\ContactDetail $contactDetail
     * @return Contact
     */
    public function setContactDetail(\Tkgl\UserBundle\Entity\ContactDetail $contactDetail = null)
    {
        $this->contactDetail = $contactDetail;

        return $this;
    }

    /**
     * Get contactDetail
     *
     * @return \Tkgl\UserBundle\Entity\ContactDetail 
     */
    public function getContactDetail()
    {
        return $this->contactDetail;
    }
}
