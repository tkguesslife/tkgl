<?php
namespace Tkgl\CoreBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base entity class to be extended by any table
 * 
 * @package    
 * @subpackage 
 * @author     Tiko Banyini <admin@tkbean.co.za>
 */
abstract class TkglEntityBase {
  
  /**
   * @ORM\Id
   *@ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  
    /**
   * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\User")
   * @ORM\JoinColumn(name="createdById", referencedColumnName="id")
   */
  protected $createdBy;
  
  
  /**
     * @var \DateTime
     */
  protected $createdAt;

  /**
     * @var \DateTime
     */
  protected $updatedAt;
  
    /**
   * @ORM\ManyToOne(targetEntity="Tkgl\UserBundle\Entity\User")
   * @ORM\JoinColumn(name="updatedById", referencedColumnName="id")
   */
  protected $updatedBy;
  
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
  
  public function __construct() {
    ;
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
     * @return Company
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
     * @return Company
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
     * Set createdBy
     *
     * @param \Tkgl\UserBundle\Entity\User $createdBy
     * @return Company
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

    /**
     * Set updatedBy
     *
     * @param \Tkgl\UserBundle\Entity\User $updatedBy
     * @return Company
     */
    public function setUpdatedBy(\Tkgl\UserBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \Tkgl\UserBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
  
}

?>
