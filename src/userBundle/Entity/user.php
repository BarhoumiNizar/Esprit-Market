<?php
// src/userBundle/Entity/User.php

namespace userBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class user extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
     /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=50, nullable=true)
     */
    private $tel;
    /**
     * @var string
     *
     * @ORM\Column(name="identifiant", type="string", length=50, nullable=true)
     */
     private $identifiant;

      /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
     private $type;
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=true)
     */
     private $etat;

    /**
     * Set tel
     *
     * @param string $tel
     * @return user
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=50, nullable=true)
     */
    private $photo;

    /**
     * Set photo
     *
     * @param string $photo
     * @return user
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getUploadDir()
    {

        return 'bundles/Photo_Users';
    }
    public function Upload()
    {
   $this->photo->move($this->getUploadDir(),$this->photo->getClientOriginalName());

$this->photo=$this->photo->getClientOriginalName();
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return user
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set identifiant
     *
     * @param string $identifiant
     * @return user
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get identifiant
     *
     * @return string 
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return user
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
