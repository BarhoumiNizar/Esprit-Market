<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vus
 *
 * @ORM\Table(name="vus")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\VusRepository")
 */
class Vus
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
     * @ORM\Column(name="annonce", type="string", length=255)
     */
    private $annonce;

      /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255,nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="nb", type="string", length=255)
     */
    private $nb;


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
     * Set annonce
     *
     * @param string $annonce
     * @return Vus
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return string 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Vus
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set nb
     *
     * @param string $nb
     * @return Vus
     */
    public function setNb($nb)
    {
        $this->nb = $nb;

        return $this;
    }

    /**
     * Get nb
     *
     * @return string 
     */
    public function getNb()
    {
        return $this->nb;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Vus
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
}
