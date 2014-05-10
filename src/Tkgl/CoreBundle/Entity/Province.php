<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="province", options={"comment" = "Gauteng, Limpopo, etc"})
 * @ORM\HasLifecycleCallbacks
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class Province extends BaseAuditableEntity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     
  /**
   * @ORM\Column(type="string", length=100, nullable=true)   
   * @Assert\NotBlank(message="Name required.")
   */
    private $name;   
    
    
    public function __toString() {
        return $this->getName();
    }
    
      /**
     * @ORM\PrePersist
     */
    public function doStuffOnPrePersist()
    {
        parent::doStuffOnPrePersist();
    }

    /**
     * @ORM\PreUpdate
     */
    public function doStuffOnPreUpdate()
    {
        parent::doStuffOnPreUpdate();
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
     * Set name
     *
     * @param string $name
     * @return Province
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
