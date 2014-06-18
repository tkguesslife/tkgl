<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="appointment")
 * @ORM\HasLifecycleCallbacks
 * @author Tiko Banyini <admin@tkbean.co.za>
 */
class Appointment extends BaseAuditableEntity {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="text", nullable=true)   
   */
  protected $attendees;

  /**
   * @ORM\Column(type="string", length=255)   
   * @Assert\NotBlank(message="Subject is required.")
   */
  protected $subject;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)   
   */
  protected $location;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  protected $appointmentDescription;

  /**
   * @ORM\Column(type="datetime")
   * @Assert\NotBlank(message="Start date and time is required.")
   */
  protected $startTime;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $endTime;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  protected $duration;

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\AppointmentStatus")
   * @ORM\JoinColumn(name="appointment_status_id", referencedColumnName="id")   
   */
  protected $appointmentStatus;

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
     * Set attendees
     *
     * @param string $attendees
     * @return Appointment
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;

        return $this;
    }

    /**
     * Get attendees
     *
     * @return string 
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Appointment
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Appointment
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set appointmentDescription
     *
     * @param string $appointmentDescription
     * @return Appointment
     */
    public function setAppointmentDescription($appointmentDescription)
    {
        $this->appointmentDescription = $appointmentDescription;

        return $this;
    }

    /**
     * Get appointmentDescription
     *
     * @return string 
     */
    public function getAppointmentDescription()
    {
        return $this->appointmentDescription;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Appointment
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Appointment
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Appointment
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set appointmentStatus
     *
     * @param \Tkgl\CoreBundle\Entity\AppointmentStatus $appointmentStatus
     * @return Appointment
     */
    public function setAppointmentStatus(\Tkgl\CoreBundle\Entity\AppointmentStatus $appointmentStatus = null)
    {
        $this->appointmentStatus = $appointmentStatus;

        return $this;
    }

    /**
     * Get appointmentStatus
     *
     * @return \Tkgl\CoreBundle\Entity\AppointmentStatus 
     */
    public function getAppointmentStatus()
    {
        return $this->appointmentStatus;
    }
}
