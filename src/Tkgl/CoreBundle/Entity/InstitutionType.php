<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="institution_type", options={"comment" = " Company, Clinic, Hospital"})
 */
class InstitutionType {
  
  
  const COMPANY = 'Company';
  const HOSPITAL = 'Hospital'; 
  const CLINIC = 'Clinic'; 
  const OTHER = 'Other';

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $name;
  
  public function __toString(){
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
   * @return ContactType
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

}
