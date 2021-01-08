<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\etudiantRepository")
 */
class etudiant
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
     * @ORM\Column(name="num_carte", type="string", length=255)
     */
    private $numCarte;


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
     * Set numCarte
     *
     * @param string $numCarte
     * @return etudiant
     */
    public function setNumCarte($numCarte)
    {
        $this->numCarte = $numCarte;

        return $this;
    }

    /**
     * Get numCarte
     *
     * @return string 
     */
    public function getNumCarte()
    {
        return $this->numCarte;
    }
}
