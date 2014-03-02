<?php

namespace Tkgl\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="contactDetail", options={"comment" = "Stores contact details for Users, Companies, Leads, etc."})
 * @ORM\HasLifecycleCallbacks
 */
class ContactDetail {

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
   * @Assert\NotBlank(message="At least one contact info is required.", groups={"contactGroupValidation"})
   */
  protected $email;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="At least one contact info is required.", groups={"contactGroupValidation"})
   */
  protected $mobileNumber;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="At least one contact info is required.", groups={"contactGroupValidation"})
   */
  protected $officeNumber;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="At least one contact info is required.", groups={"contactGroupValidation"})
   */
  protected $homeNumber;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $streetAddress1;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $streetAddress2;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $streetAddress3;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $streetAddress4;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $streetAddress5;

  /**
   * @ORM\Column(type="string", nullable=true)   
   */
  protected $streetCode;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $postalAddress1;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $postalAddress2;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $postalAddress3;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $postalAddress4;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   */
  protected $postalAddress5;

  /**
   * @ORM\Column(type="string", nullable=true)   
   */
  protected $postalCode;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  protected $createdAt;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  protected $updatedAt;

  /**
   * @ORM\PrePersist 
   */
  public function doStuffOnPrePersist() {
    $this->setCreatedAt(new \DateTime());
  }

  /**
   * @ORM\PreUpdate 
   */
  public function doStuffOnPreUpdate() {
    $this->setUpdatedAt(new \DateTime());
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
     * @return ContactDetail
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
     * @return ContactDetail
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
     * Set email
     *
     * @param string $email
     * @return ContactDetail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return ContactDetail
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set officeNumber
     *
     * @param string $officeNumber
     * @return ContactDetail
     */
    public function setOfficeNumber($officeNumber)
    {
        $this->officeNumber = $officeNumber;

        return $this;
    }

    /**
     * Get officeNumber
     *
     * @return string 
     */
    public function getOfficeNumber()
    {
        return $this->officeNumber;
    }

    /**
     * Set homeNumber
     *
     * @param string $homeNumber
     * @return ContactDetail
     */
    public function setHomeNumber($homeNumber)
    {
        $this->homeNumber = $homeNumber;

        return $this;
    }

    /**
     * Get homeNumber
     *
     * @return string 
     */
    public function getHomeNumber()
    {
        return $this->homeNumber;
    }

    /**
     * Set streetAddress1
     *
     * @param string $streetAddress1
     * @return ContactDetail
     */
    public function setStreetAddress1($streetAddress1)
    {
        $this->streetAddress1 = $streetAddress1;

        return $this;
    }

    /**
     * Get streetAddress1
     *
     * @return string 
     */
    public function getStreetAddress1()
    {
        return $this->streetAddress1;
    }

    /**
     * Set streetAddress2
     *
     * @param string $streetAddress2
     * @return ContactDetail
     */
    public function setStreetAddress2($streetAddress2)
    {
        $this->streetAddress2 = $streetAddress2;

        return $this;
    }

    /**
     * Get streetAddress2
     *
     * @return string 
     */
    public function getStreetAddress2()
    {
        return $this->streetAddress2;
    }

    /**
     * Set streetAddress3
     *
     * @param string $streetAddress3
     * @return ContactDetail
     */
    public function setStreetAddress3($streetAddress3)
    {
        $this->streetAddress3 = $streetAddress3;

        return $this;
    }

    /**
     * Get streetAddress3
     *
     * @return string 
     */
    public function getStreetAddress3()
    {
        return $this->streetAddress3;
    }

    /**
     * Set streetAddress4
     *
     * @param string $streetAddress4
     * @return ContactDetail
     */
    public function setStreetAddress4($streetAddress4)
    {
        $this->streetAddress4 = $streetAddress4;

        return $this;
    }

    /**
     * Get streetAddress4
     *
     * @return string 
     */
    public function getStreetAddress4()
    {
        return $this->streetAddress4;
    }

    /**
     * Set streetAddress5
     *
     * @param string $streetAddress5
     * @return ContactDetail
     */
    public function setStreetAddress5($streetAddress5)
    {
        $this->streetAddress5 = $streetAddress5;

        return $this;
    }

    /**
     * Get streetAddress5
     *
     * @return string 
     */
    public function getStreetAddress5()
    {
        return $this->streetAddress5;
    }

    /**
     * Set streetCode
     *
     * @param string $streetCode
     * @return ContactDetail
     */
    public function setStreetCode($streetCode)
    {
        $this->streetCode = $streetCode;

        return $this;
    }

    /**
     * Get streetCode
     *
     * @return string 
     */
    public function getStreetCode()
    {
        return $this->streetCode;
    }

    /**
     * Set postalAddress1
     *
     * @param string $postalAddress1
     * @return ContactDetail
     */
    public function setPostalAddress1($postalAddress1)
    {
        $this->postalAddress1 = $postalAddress1;

        return $this;
    }

    /**
     * Get postalAddress1
     *
     * @return string 
     */
    public function getPostalAddress1()
    {
        return $this->postalAddress1;
    }

    /**
     * Set postalAddress2
     *
     * @param string $postalAddress2
     * @return ContactDetail
     */
    public function setPostalAddress2($postalAddress2)
    {
        $this->postalAddress2 = $postalAddress2;

        return $this;
    }

    /**
     * Get postalAddress2
     *
     * @return string 
     */
    public function getPostalAddress2()
    {
        return $this->postalAddress2;
    }

    /**
     * Set postalAddress3
     *
     * @param string $postalAddress3
     * @return ContactDetail
     */
    public function setPostalAddress3($postalAddress3)
    {
        $this->postalAddress3 = $postalAddress3;

        return $this;
    }

    /**
     * Get postalAddress3
     *
     * @return string 
     */
    public function getPostalAddress3()
    {
        return $this->postalAddress3;
    }

    /**
     * Set postalAddress4
     *
     * @param string $postalAddress4
     * @return ContactDetail
     */
    public function setPostalAddress4($postalAddress4)
    {
        $this->postalAddress4 = $postalAddress4;

        return $this;
    }

    /**
     * Get postalAddress4
     *
     * @return string 
     */
    public function getPostalAddress4()
    {
        return $this->postalAddress4;
    }

    /**
     * Set postalAddress5
     *
     * @param string $postalAddress5
     * @return ContactDetail
     */
    public function setPostalAddress5($postalAddress5)
    {
        $this->postalAddress5 = $postalAddress5;

        return $this;
    }

    /**
     * Get postalAddress5
     *
     * @return string 
     */
    public function getPostalAddress5()
    {
        return $this->postalAddress5;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return ContactDetail
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ContactDetail
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return ContactDetail
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
