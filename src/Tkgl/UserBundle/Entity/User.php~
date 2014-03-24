<?php

namespace Tkgl\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="sysUser", options={"comment" = "Users that have access to application."})
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Person" ,cascade={"persist"})
   * @ORM\JoinColumn(name="personId", referencedColumnName="id")
   */
  protected $person;

  /**
   * @ORM\ManyToMany(targetEntity="Tkgl\UserBundle\Entity\UserGroup", inversedBy="users")
   * @ORM\JoinTable(name="usersGroups",
     *      joinColumns={@ORM\JoinColumn(name="userId", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="userGroupId", referencedColumnName="id")}
     *      )   
   */
  protected $userGroups;

  /**
   * @ORM\ManyToMany(targetEntity="Tkgl\UserBundle\Entity\UserTeam", inversedBy="teamUsers")
   * @ORM\JoinTable(name="userTeams",
     *      joinColumns={@ORM\JoinColumn(name="userId", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="userTeamId", referencedColumnName="id")}
     *      )   
   */
  protected $userTeams;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $createdAt;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  protected $updatedAt;
  
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * @return User
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
     * Set person
     *
     * @param \Tkgl\CoreBundle\Entity\Person $person
     * @return User
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
     * Add userGroups
     *
     * @param \Tkgl\UserBundle\Entity\UserGroup $userGroups
     * @return User
     */
    public function addUserGroup(\Tkgl\UserBundle\Entity\UserGroup $userGroups)
    {
        $this->userGroups[] = $userGroups;

        return $this;
    }

    /**
     * Remove userGroups
     *
     * @param \Tkgl\UserBundle\Entity\UserGroup $userGroups
     */
    public function removeUserGroup(\Tkgl\UserBundle\Entity\UserGroup $userGroups)
    {
        $this->userGroups->removeElement($userGroups);
    }

    /**
     * Get userGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserGroups()
    {
        return $this->userGroups;
    }

    /**
     * Add userTeams
     *
     * @param \Tkgl\UserBundle\Entity\UserTeam $userTeams
     * @return User
     */
    public function addUserTeam(\Tkgl\UserBundle\Entity\UserTeam $userTeams)
    {
        $this->userTeams[] = $userTeams;
        $userTeams->addTeamUser($this);
        return $this;
    }

    /**
     * Remove userTeams
     *
     * @param \Tkgl\UserBundle\Entity\UserTeam $userTeams
     */
    public function removeUserTeam(\Tkgl\UserBundle\Entity\UserTeam $userTeams)
    {
        $this->userTeams->removeElement($userTeams);
    }

    /**
     * Get userTeams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserTeams()
    {
        return $this->userTeams;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->userGroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userTeams = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
