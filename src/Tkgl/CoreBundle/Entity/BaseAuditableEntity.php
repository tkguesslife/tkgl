<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tkgl\CoreBundle\Entity\BaseEntity;

/**
 * Description of BaseAuditableEntity
 *
 * @author     Tiko Banyini <admin@tkbean.co.za>
 */
class BaseAuditableEntity extends BaseEntity {

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\User")
   * @ORM\JoinColumn(name="createdById", referencedColumnName="id")
   */
  private $createdBy;

  /**
   * @var \DateTime
   */
  private $createdAt;

  /**
   * @var \DateTime
   */
  private $updatedAt;

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\User")
   * @ORM\JoinColumn(name="updatedById", referencedColumnName="id")
   */
  private $updatedBy;

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

  public function getCreatedBy() {
    return $this->createdBy;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

  public function getUpdatedAt() {
    return $this->updatedAt;
  }

  public function getUpdatedBy() {
    return $this->updatedBy;
  }

  public function setCreatedBy($createdBy) {
    $this->createdBy = $createdBy;
  }

  public function setCreatedAt(\DateTime $createdAt) {
    $this->createdAt = $createdAt;
  }

  public function setUpdatedAt(\DateTime $updatedAt) {
    $this->updatedAt = $updatedAt;
  }

  public function setUpdatedBy($updatedBy) {
    $this->updatedBy = $updatedBy;
  }

}
