<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="appointment_status")
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class AppointmentStatus {

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
  
  const SCHEDULED = 'SCHEDULED';
  const DELETED = 'DELETED';
  
  
  public function __toString(){
    return $this->getName();
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
     * @return AppointmentStatus
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
