<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="address", options={"comment" = "Stores addresses."})
 * @ORM\HasLifecycleCallbacks
 */
class Address extends BaseAuditableEntity {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  
  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\AddressType")
   * @ORM\JoinColumn(name="addressTypeId", referencedColumnName="id")
   */
  protected $addressType;

  /**
   * @ORM\Column(type="text")
   * @Assert\NotBlank()
   */
  protected $address;

  /**
   * @ORM\Column(type="string", nullable=true)   
   */
  protected $postalCode;

  


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
     * Set address
     *
     * @param string $address
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return Address
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
     * Set addressType
     *
     * @param \Tkgl\CoreBundle\Entity\AddressType $addressType
     * @return Address
     */
    public function setAddressType(\Tkgl\CoreBundle\Entity\AddressType $addressType = null)
    {
        $this->addressType = $addressType;

        return $this;
    }

    /**
     * Get addressType
     *
     * @return \Tkgl\CoreBundle\Entity\AddressType 
     */
    public function getAddressType()
    {
        return $this->addressType;
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
