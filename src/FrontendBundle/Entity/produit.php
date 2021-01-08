<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\produitRepository")
 */
class produit
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
     * @ORM\Column(name="produit", type="string", length=50)
     */
    private $produit;
 /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50)
     */
    private $description;
     /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50)
     */

     private $num_commande;
    /**
     * @var int
     *
     * @ORM\Column(name="num_commande", type="integer", length=50)
     */
    
    private $num_jaime;
    /**
     * @var int
     *
     * @ORM\Column(name="num_jaime", type="integer", length=50)
     */


    


    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;


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
     * Set produit
     *
     * @param string $produit
     * @return produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string 
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set num_commande
     *
     * @param string $numCommande
     * @return produit
     */
    public function setNumCommande($numCommande)
    {
        $this->num_commande = $numCommande;

        return $this;
    }

    /**
     * Get num_commande
     *
     * @return string 
     */
    public function getNumCommande()
    {
        return $this->num_commande;
    }

    /**
     * Set num_jaime
     *
     * @param integer $numJaime
     * @return produit
     */
    public function setNumJaime($numJaime)
    {
        $this->num_jaime = $numJaime;

        return $this;
    }

    /**
     * Get num_jaime
     *
     * @return integer 
     */
    public function getNumJaime()
    {
        return $this->num_jaime;
    }
}
