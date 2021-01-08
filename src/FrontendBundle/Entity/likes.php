<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * likes
 *
 * @ORM\Table(name="likes")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\likesRepository")
 */
class likes
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
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_like", type="integer")
     */
    private $nbLike;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_deslike", type="integer")
     */
    private $nbDeslike;


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
     * @return likes
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
     * Set user
     *
     * @param string $user
     * @return likes
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
     * Set nbLike
     *
     * @param integer $nbLike
     * @return likes
     */
    public function setNbLike($nbLike)
    {
        $this->nbLike = $nbLike;

        return $this;
    }

    /**
     * Get nbLike
     *
     * @return integer 
     */
    public function getNbLike()
    {
        return $this->nbLike;
    }

    /**
     * Set nbDeslike
     *
     * @param integer $nbDeslike
     * @return likes
     */
    public function setNbDeslike($nbDeslike)
    {
        $this->nbDeslike = $nbDeslike;

        return $this;
    }

    /**
     * Get nbDeslike
     *
     * @return integer 
     */
    public function getNbDeslike()
    {
        return $this->nbDeslike;
    }
}
