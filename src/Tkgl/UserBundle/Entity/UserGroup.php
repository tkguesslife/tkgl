<?php

namespace Tkgl\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_group", options={"comment" = "Stores user group desciption."})
 * @ORM\HasLifecycleCallbacks
 */
class UserGroup  extends BaseAuditableEntity{

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
  protected $groupDescription;

  /**
   * @ORM\ManyToMany(targetEntity="Tkgl\UserBundle\Entity\User", mappedBy="userGroups", cascade="persist")   
   */
  protected $users;
 

  public function __toString() {
    return $this->name;
  }
   
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return UserGroup
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
     * Set groupDescription
     *
     * @param string $groupDescription
     * @return UserGroup
     */
    public function setGroupDescription($groupDescription)
    {
        $this->groupDescription = $groupDescription;

        return $this;
    }

    /**
     * Get groupDescription
     *
     * @return string 
     */
    public function getGroupDescription()
    {
        return $this->groupDescription;
    }

    /**
     * Add users
     *
     * @param \Tkgl\UserBundle\Entity\User $users
     * @return UserGroup
     */
    public function addUser(\Tkgl\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Tkgl\UserBundle\Entity\User $users
     */
    public function removeUser(\Tkgl\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
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
