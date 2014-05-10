<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 * @ORM\HasLifecycleCallbacks
 */
class Deal extends BaseAuditableEntity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Person")
   * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
   */
  protected $person;
  
  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\UserTeam" , inversedBy="deals")
   * @ORM\JoinColumn(name="user_team_id", referencedColumnName="id")
   */
  protected $team;
  
    /**
   * @ORM\OneToMany(targetEntity="Tkgl\CoreBundle\Entity\DealStateUpdate", mappedBy="deal", cascade={"persist"})
   */
  protected $dealStateUpdates;

  public function __toString() {
      return $this->getPerson()->getFirstName().'  '.$this->$this->getPerson()->getLastName();
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
     * Constructor
     */
    public function __construct()
    {
        $this->dealStateUpdates = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set person
     *
     * @param \Tkgl\CoreBundle\Entity\Person $person
     * @return Deal
     */
    public function setPerson(\Tkgl\CoreBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Tkgl\CoreBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set team
     *
     * @param \Tkgl\UserBundle\Entity\UserTeam $team
     * @return Deal
     */
    public function setTeam(\Tkgl\UserBundle\Entity\UserTeam $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Tkgl\UserBundle\Entity\UserTeam 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Add dealStateUpdates
     *
     * @param \Tkgl\CoreBundle\Entity\DealStateUpdate $dealStateUpdates
     * @return Deal
     */
    public function addDealStateUpdate(\Tkgl\CoreBundle\Entity\DealStateUpdate $dealStateUpdates)
    {
        $this->dealStateUpdates[] = $dealStateUpdates;

        return $this;
    }

    /**
     * Remove dealStateUpdates
     *
     * @param \Tkgl\CoreBundle\Entity\DealStateUpdate $dealStateUpdates
     */
    public function removeDealStateUpdate(\Tkgl\CoreBundle\Entity\DealStateUpdate $dealStateUpdates)
    {
        $this->dealStateUpdates->removeElement($dealStateUpdates);
    }

    /**
     * Get dealStateUpdates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDealStateUpdates()
    {
        return $this->dealStateUpdates;
    }
}
