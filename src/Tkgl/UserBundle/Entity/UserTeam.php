<?php

namespace Tkgl\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Tkgl\UserBundle\Entity\Repository\UserTeamRepository")
 * @ORM\Table(name="userTeam", options={"comment" = "Stores user team desciption."})
 * @ORM\HasLifecycleCallbacks
 */
class UserTeam {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=100)   
   * @Assert\NotBlank()
   */
  protected $name;

  /**
   * @ORM\Column(type="text")
   * @Assert\NotBlank()
   */
  protected $teamDescription;

  /**
   * @ORM\OneToMany(targetEntity="Tkgl\UserBundle\Entity\User", mappedBy="consultantTeam", cascade="persist")   
   */
  protected $teamUsers;
  

  /**
   * @ORM\ManyToOne(targetEntity="\Tkgl\UserBundle\Entity\User")
   * @ORM\JoinColumn(name="CreatedById", referencedColumnName="id")
   */
  protected $createdBy;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $createdAt;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  protected $updatedAt;


  public function __toString() {
    return $this->name;
  }

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

  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teamUsers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->deals = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return UserTeam
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

    /**
     * Set teamDescription
     *
     * @param string $teamDescription
     * @return UserTeam
     */
    public function setTeamDescription($teamDescription)
    {
        $this->teamDescription = $teamDescription;

        return $this;
    }

    /**
     * Get teamDescription
     *
     * @return string 
     */
    public function getTeamDescription()
    {
        return $this->teamDescription;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UserTeam
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return UserTeam
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add teamUsers
     *
     * @param \Tkgl\UserBundle\Entity\User $teamUsers
     * @return UserTeam
     */
    public function addTeamUser(\Tkgl\UserBundle\Entity\User $teamUsers)
    {
        $this->teamUsers[] = $teamUsers;

        return $this;
    }

    /**
     * Remove teamUsers
     *
     * @param \Tkgl\UserBundle\Entity\User $teamUsers
     */
    public function removeTeamUser(\Tkgl\UserBundle\Entity\User $teamUsers)
    {
        $this->teamUsers->removeElement($teamUsers);
    }

    /**
     * Get teamUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamUsers()
    {
        return $this->teamUsers;
    }

    /**
     * Add deals
     *
     * @param \Tkgl\DealBundle\Entity\Deal $deals
     * @return UserTeam
     */
    public function addDeal(\Tkgl\DealBundle\Entity\Deal $deals)
    {
        $this->deals[] = $deals;

        return $this;
    }

    /**
     * Remove deals
     *
     * @param \Tkgl\DealBundle\Entity\Deal $deals
     */
    public function removeDeal(\Tkgl\DealBundle\Entity\Deal $deals)
    {
        $this->deals->removeElement($deals);
    }

    /**
     * Get deals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeals()
    {
        return $this->deals;
    }

    /**
     * Set createdBy
     *
     * @param \Tkgl\UserBundle\Entity\User $createdBy
     * @return UserTeam
     */
    public function setCreatedBy(\Tkgl\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Tkgl\UserBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
