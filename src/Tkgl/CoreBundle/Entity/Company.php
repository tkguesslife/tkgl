<?php

namespace Tkgl\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="company")
 */
class Company {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)   
     * @Assert\NotBlank(message="Name required.", groups={"companyNameValidation"})
     */
    protected $companyName;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $companyDescription;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Tkgl\CoreBundle\Entity\Province")
     * @ORM\JoinColumn(name="provinceId", referencedColumnName="id")
     */
    protected $province;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $region;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return Company
     */
    public function setCompanyName($companyName) {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string 
     */
    public function getCompanyName() {
        return $this->companyName;
    }

    /**
     * Set companyDescription
     *
     * @param string $companyDescription
     * @return Company
     */
    public function setCompanyDescription($companyDescription) {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    /**
     * Get companyDescription
     *
     * @return string 
     */
    public function getCompanyDescription() {
        return $this->companyDescription;
    }

}
