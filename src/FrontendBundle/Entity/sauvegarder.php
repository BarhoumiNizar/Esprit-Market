<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sauvegarder
 *
 * @ORM\Table(name="sauvegarder")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\sauvegarderRepository")
 */
class sauvegarder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="annonces",cascade={"persist"})
     * @ORM\joinColumn(onDelete="SET NULL")
     */
    private $annonce;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;


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
     * Set user
     *
     * @param string $user
     * @return sauvegarder
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    

    /**
     * Set annonce
     *
     * @param \FrontendBundle\Entity\annonces $annonce
     * @return sauvegarder
     */
    public function setAnnonce(\FrontendBundle\Entity\annonces $annonce = null)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \FrontendBundle\Entity\annonces 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }
}
