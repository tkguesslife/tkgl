<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of BaseAuditableEntity
 * @ORM\MappedSuperclass
 * 
 * @author     Tiko Banyini <admin@tkbean.co.za>
 */
abstract class BaseAuditableEntity{

    /**
     * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="created_by_id", referencedColumnName="id")
     */
    private $createdBy;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;


    /**
     * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="updated_by_id", referencedColumnName="id")
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
