<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity(repositoryClass="Tkgl\CoreBundle\Entity\Repository\DealStateRepository")
 * @ORM\Table(name="deal_state")
 * @ORM\HasLifecycleCallbacks
 */
class DealState extends BaseAuditableEntity {

  CONST NEW_LEAD_STATE = 'New lead';
  CONST PROSPECT_STATE = 'Prospect';
  CONST NTU_STATE = 'NTU';
  CONST CLIENT_STATE = 'Client';

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

  public function __toString() {
    return $this->getName();
  }

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
   * @return DealState
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
