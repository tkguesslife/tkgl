<?php
namespace Tkgl\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tkgl\CoreBundle\Entity\BaseAuditableEntity;

/**
 * @ORM\Entity(repositoryClass="Tkgl\UserBundle\Entity\Repository\UserTeamRepository")
 * @ORM\Table(name="user_team", options={"comment" = "Stores user team desciption."})
 * @ORM\HasLifecycleCallbacks
 */
class UserTeam  extends BaseAuditableEntity{

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
   * @ORM\ManyToMany(targetEntity="Tkgl\UserBundle\Entity\User", mappedBy="userTeams", cascade={"persist"})   
   */
  protected $teamUsers;  
  
  /**
   *
   * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Province")
   * @ORM\JoinColumn(name="province_id", referencedColumnName="id")
   */
  protected $province;
  
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   */
  protected  $region;
  
    /**
   * @ORM\OneToMany(targetEntity="Tkgl\CoreBundle\Entity\Deal", mappedBy="team")
   */
  protected $deals;


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
    
    public function __toString() {
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
     * Add teamUsers
     *
     * @param \Tkgl\UserBundle\Entity\User $teamUsers
     * @return UserTeam
     */
    public function addTeamUser(\Tkgl\UserBundle\Entity\User $teamUsers)
    {
//        $teamUsers->addUserTeam($this);
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
     * Set province
     *
     * @param \Tkgl\CoreBundle\Entity\Province $province
     * @return UserTeam
     */
    public function setProvince(\Tkgl\CoreBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \Tkgl\CoreBundle\Entity\Province 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return UserTeam
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teamUsers = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add deals
     *
     * @param \Tkgl\CoreBundle\Entity\Deal $deals
     * @return UserTeam
     */
    public function addDeal(\Tkgl\CoreBundle\Entity\Deal $deals)
    {
        $this->deals[] = $deals;

        return $this;
    }

    /**
     * Remove deals
     *
     * @param \Tkgl\CoreBundle\Entity\Deal $deals
     */
    public function removeDeal(\Tkgl\CoreBundle\Entity\Deal $deals)
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
}
