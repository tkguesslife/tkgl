<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Tkgl\CoreBundle\Entity\Repository\DeaStateUpdateRepository")
 * @ORM\Table(name="deal_state_update")
 * @ORM\HasLifecycleCallbacks
 */
class DealStateUpdate extends BaseAuditableEntity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Deal", inversedBy="dealStateUpdates")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")     
     */
    protected $deal;

    /**
     * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\DealState")
     * @ORM\JoinColumn(name="deal_state_id", referencedColumnName="id")   
     */
    protected $dealState;

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

    public function __toString() {
      return $this->getDealState()->getName();
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
     * @return DealStateUpdate
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
     * Set dealState
     *
     * @param \Tkgl\CoreBundle\Entity\DealState $dealState
     * @return DealStateUpdate
     */
    public function setDealState(\Tkgl\CoreBundle\Entity\DealState $dealState = null)
    {
        $this->dealState = $dealState;

        return $this;
    }

    /**
     * Get dealState
     *
     * @return \Tkgl\CoreBundle\Entity\DealState 
     */
    public function getDealState()
    {
        return $this->dealState;
    }
}
