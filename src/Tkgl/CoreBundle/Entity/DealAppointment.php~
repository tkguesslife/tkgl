<?php
namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Tkgl\CoreBundle\Entity\Repository\DealAppointmentRepository")
 * @ORM\Table(name="deal_appointment")
 * @ORM\HasLifecycleCallbacks
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class DealAppointment extends BaseAuditableEntity {
  
  /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Deal", inversedBy="dealAppointments")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")     
     */
    protected $deal;
    
     /**
     * @ORM\OneToOne(targetEntity="Tkgl\CoreBundle\Entity\Appointment", cascade={"persist"})
     * @ORM\JoinColumn(name="appointment_id", referencedColumnName="id")   
     */
    protected $appointment;


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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set deal
     *
     * @param \Tkgl\CoreBundle\Entity\Deal $deal
     * @return DealAppointment
     */
    public function setDeal(\Tkgl\CoreBundle\Entity\Deal $deal = null)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return \Tkgl\CoreBundle\Entity\Deal 
     */
    public function getDeal()
    {
        return $this->deal;
    }

    /**
     * Set appointment
     *
     * @param \Tkgl\CoreBundle\Entity\Appointment $appointment
     * @return DealAppointment
     */
    public function setAppointment(\Tkgl\CoreBundle\Entity\Appointment $appointment = null)
    {
        $this->appointment = $appointment;

        return $this;
    }

    /**
     * Get appointment
     *
     * @return \Tkgl\CoreBundle\Entity\Appointment 
     */
    public function getAppointment()
    {
        return $this->appointment;
    }
}
