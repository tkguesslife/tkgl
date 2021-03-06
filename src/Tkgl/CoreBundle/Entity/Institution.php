<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="institution")
 * @ORM\HasLifecycleCallbacks
 */
class Institution extends BaseAuditableEntity {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="Name required.", groups={"companyNameValidation"})
   */
  protected $name;

  /**
   * @ORM\Column(type="text")
   * @Assert\NotBlank()
   */
  protected $institutionDescription;

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\InstitutionType")
   * @ORM\JoinColumn(name="institution_type_id", referencedColumnName="id")
   */
  protected $institutionType;

  /**
   *
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Province")
   * @ORM\JoinColumn(name="province_id", referencedColumnName="id")
   */
  protected $province;

  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   */
  protected $region;

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

  public function __toString() {
    return $this->getName();
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
   * Set name
   *
   * @param string $name
   * @return Institution
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * Get name
   *
   * @return string 
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set institutionDescription
   *
   * @param string $institutionDescription
   * @return Institution
   */
  public function setInstitutionDescription($institutionDescription) {
    $this->institutionDescription = $institutionDescription;

    return $this;
  }

  /**
   * Get institutionDescription
   *
   * @return string 
   */
  public function getInstitutionDescription() {
    return $this->institutionDescription;
  }

  /**
   * Set region
   *
   * @param string $region
   * @return Institution
   */
  public function setRegion($region) {
    $this->region = $region;

    return $this;
  }

  /**
   * Get region
   *
   * @return string 
   */
  public function getRegion() {
    return $this->region;
  }

  /**
   * Set institutionType
   *
   * @param \Tkgl\CoreBundle\Entity\InstitutionType $institutionType
   * @return Institution
   */
  public function setInstitutionType(\Tkgl\CoreBundle\Entity\InstitutionType $institutionType = null) {
    $this->institutionType = $institutionType;

    return $this;
  }

  /**
   * Get institutionType
   *
   * @return \Tkgl\CoreBundle\Entity\InstitutionType 
   */
  public function getInstitutionType() {
    return $this->institutionType;
  }

  /**
   * Set province
   *
   * @param \Tkgl\CoreBundle\Entity\Province $province
   * @return Institution
   */
  public function setProvince(\Tkgl\CoreBundle\Entity\Province $province = null) {
    $this->province = $province;

    return $this;
  }

  /**
   * Get province
   *
   * @return \Tkgl\CoreBundle\Entity\Province 
   */
  public function getProvince() {
    return $this->province;
  }

}
