<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * annonces
 *
 * @ORM\Table(name="annonces")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\annoncesRepository")
 */
class annonces
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
     * @ORM\Column(name="titre", type="string", length=50, nullable=true)
     */
    private $titre;

     /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=50, nullable=true)
     */
     private $niveau;

    

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=50, nullable=true)
     */
    private $fichier;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier1", type="string", length=50, nullable=true)
     */
    private $fichier1;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier2", type="string", length=50, nullable=true)
     */
    private $fichier2;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier3", type="string", length=50, nullable=true)
     */
    private $fichier3;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier4", type="string", length=50, nullable=true)
     */
    private $fichier4;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    

    /**
     * @var string
     *
     * @ORM\Column(name="offre", type="string", length=50, nullable=true)
     */
     private $offre;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_annonce", type="string", length=50)
     */
    private $categorieAnnonce;

      

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=true)
     */
    private $ville;
    /**
     * @var string
     *
     * @ORM\Column(name="coord_ville", type="string", length=50, nullable=true)
     */
     private $coord_ville;

    /**
     * @var string
     *
     * @ORM\Column(name="debut_evenement", type="string", length=50, nullable=true)
     */
     private $debut_evenement;
     

     /**
     * @var string
     *
     * @ORM\Column(name="fin_evenement", type="string", length=50, nullable=true)
     */
     private $fin_evenement;
     /**
     * @var string
     *
     * @ORM\Column(name="heure_debut", type="string", length=50, nullable=true)
     */
     private $heure_debut;
    /**
     * @var string
     *
     * @ORM\Column(name="email_user", type="string", length=50, nullable=true)
     */
     private $email_user;
      /**
     * @var string
     *
     * @ORM\Column(name="tel_user", type="string", length=50, nullable=true)
     */
     private $tel_user;
      /**
     * @var string
     *
     * @ORM\Column(name="id_user", type="string", length=50, nullable=true)
     */
     private $id_user;

      

     /**
     * @var string
     *
     * @ORM\Column(name="heure_fin", type="string", length=50, nullable=true)
     */
     private $heure_fin;
    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="date_annonce", type="string",length=50)
     */
    private $dateAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="num_commande", type="string", length=50, nullable=true)
     */
    private $numCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="desc1", type="string", length=50, nullable=true)
     */
     private $desc1;
     /**
     * @var string
     *
     * @ORM\Column(name="desc2", type="string", length=50, nullable=true)
     */
     private $desc2;
     /**
     * @var string
     *
     * @ORM\Column(name="desc3", type="string", length=50, nullable=true)
     */
     private $desc3;
     /**
     * @var string
     *
     * @ORM\Column(name="desc4", type="string", length=50, nullable=true)
     */
     private $desc4;
     /**
     * @var string
     *
     * @ORM\Column(name="desc5", type="string", length=50, nullable=true)
     */
     private $desc5;
     /**
     * @var string
     *
     * @ORM\Column(name="desc6", type="string", length=50, nullable=true)
     */
     private $desc6;

     /**
     * @var string
     *
     * @ORM\Column(name="nbr_vue", type="string", length=50, nullable=true)
     */
     private $nbr_vue;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=50, nullable=true)
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="num_jaime", type="integer", nullable=true)
     */
    private $numJaime;


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
     * Set fichier
     *
     * @param string $fichier
     * @return annonces
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string 
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return annonces
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

    

    

    public function getUploadDir()
    {

        return 'fichier_Annonces';
    }
    public function Upload()
    {
     $this->fichier->move($this->getUploadDir(),$this->fichier->getClientOriginalName());

     $this->fichier=$this->fichier->getClientOriginalName();
    }
    /**
     * Set niveau
     *
     * @param string $niveau
     * @return annonces
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     * @return annonces
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    
    /**
     * Set numCommande
     *
     * @param string $numCommande
     * @return annonces
     */
    public function setNumCommande($numCommande)
    {
        $this->numCommande = $numCommande;

        return $this;
    }

    /**
     * Get numCommande
     *
     * @return string 
     */
    public function getNumCommande()
    {
        return $this->numCommande;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return annonces
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
     * Set numJaime
     *
     * @param integer $numJaime
     * @return annonces
     */
    public function setNumJaime($numJaime)
    {
        $this->numJaime = $numJaime;

        return $this;
    }

    /**
     * Get numJaime
     *
     * @return integer 
     */
    public function getNumJaime()
    {
        return $this->numJaime;
    }

    /**
     * Set categorieAnnonce
     *
     * @param string $categorieAnnonce
     * @return annonces
     */
    public function setCategorieAnnonce($categorieAnnonce)
    {
        $this->categorieAnnonce = $categorieAnnonce;

        return $this;
    }

    /**
     * Get categorieAnnonce
     *
     * @return string 
     */
    public function getCategorieAnnonce()
    {
        return $this->categorieAnnonce;
    }

    /**
     * Set dateAnnonce
     *
     * @param string $dateAnnonce
     * @return annonces
     */
    public function setDateAnnonce($dateAnnonce)
    {
        $this->dateAnnonce = $dateAnnonce;

        return $this;
    }

    /**
     * Get dateAnnonce
     *
     * @return \string 
     */
    public function getDateAnnonce()
    {
        return $this->dateAnnonce;
    }

    /**
     * Set offre
     *
     * @param string $offre
     * @return annonces
     */
    public function setOffre($offre)
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * Get offre
     *
     * @return string 
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return annonces
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return annonces
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set debut_evenement
     *
     * @param string $debutEvenement
     * @return annonces
     */
    public function setDebutEvenement($debutEvenement)
    {
        $this->debut_evenement = $debutEvenement;

        return $this;
    }

    /**
     * Get debut_evenement
     *
     * @return string 
     */
    public function getDebutEvenement()
    {
        return $this->debut_evenement;
    }

    /**
     * Set fin_evenement
     *
     * @param string $finEvenement
     * @return annonces
     */
    public function setFinEvenement($finEvenement)
    {
        $this->fin_evenement = $finEvenement;

        return $this;
    }

    /**
     * Get fin_evenement
     *
     * @return string 
     */
    public function getFinEvenement()
    {
        return $this->fin_evenement;
    }

    /**
     * Set heure_debut
     *
     * @param string $heureDebut
     * @return annonces
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heure_debut = $heureDebut;

        return $this;
    }

    /**
     * Get heure_debut
     *
     * @return string 
     */
    public function getHeureDebut()
    {
        return $this->heure_debut;
    }

    /**
     * Set email_user
     *
     * @param string $emailUser
     * @return annonces
     */
    public function setEmailUser($emailUser)
    {
        $this->email_user = $emailUser;

        return $this;
    }

    /**
     * Get email_user
     *
     * @return string 
     */
    public function getEmailUser()
    {
        return $this->email_user;
    }

    /**
     * Set tel_user
     *
     * @param string $telUser
     * @return annonces
     */
    public function setTelUser($telUser)
    {
        $this->tel_user = $telUser;

        return $this;
    }

    /**
     * Get tel_user
     *
     * @return string 
     */
    public function getTelUser()
    {
        return $this->tel_user;
    }

    /**
     * Set id_user
     *
     * @param string $idUser
     * @return annonces
     */
    public function setIdUser($idUser)
    {
        $this->id_user = $idUser;

        return $this;
    }

    /**
     * Get id_user
     *
     * @return string 
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set heure_fin
     *
     * @param string $heureFin
     * @return annonces
     */
    public function setHeureFin($heureFin)
    {
        $this->heure_fin = $heureFin;

        return $this;
    }

    /**
     * Get heure_fin
     *
     * @return string 
     */
    public function getHeureFin()
    {
        return $this->heure_fin;
    }

    /**
     * Set coord_ville
     *
     * @param string $coordVille
     * @return annonces
     */
    public function setCoordVille($coordVille)
    {
        $this->coord_ville = $coordVille;

        return $this;
    }

    /**
     * Get coord_ville
     *
     * @return string 
     */
    public function getCoordVille()
    {
        return $this->coord_ville;
    }

    /**
     * Set nbr_vue
     *
     * @param string $nbrVue
     * @return annonces
     */
    public function setNbrVue($nbrVue)
    {
        $this->nbr_vue = $nbrVue;

        return $this;
    }

    /**
     * Get nbr_vue
     *
     * @return string 
     */
    public function getNbrVue()
    {
        return $this->nbr_vue;
    }

    /**
     * Set desc1
     *
     * @param string $desc1
     * @return annonces
     */
    public function setDesc1($desc1)
    {
        $this->desc1 = $desc1;

        return $this;
    }

    /**
     * Get desc1
     *
     * @return string 
     */
    public function getDesc1()
    {
        return $this->desc1;
    }

    /**
     * Set desc2
     *
     * @param string $desc2
     * @return annonces
     */
    public function setDesc2($desc2)
    {
        $this->desc2 = $desc2;

        return $this;
    }

    /**
     * Get desc2
     *
     * @return string 
     */
    public function getDesc2()
    {
        return $this->desc2;
    }

    /**
     * Set desc3
     *
     * @param string $desc3
     * @return annonces
     */
    public function setDesc3($desc3)
    {
        $this->desc3 = $desc3;

        return $this;
    }

    /**
     * Get desc3
     *
     * @return string 
     */
    public function getDesc3()
    {
        return $this->desc3;
    }

    /**
     * Set desc4
     *
     * @param string $desc4
     * @return annonces
     */
    public function setDesc4($desc4)
    {
        $this->desc4 = $desc4;

        return $this;
    }

    /**
     * Get desc4
     *
     * @return string 
     */
    public function getDesc4()
    {
        return $this->desc4;
    }

    /**
     * Set desc5
     *
     * @param string $desc5
     * @return annonces
     */
    public function setDesc5($desc5)
    {
        $this->desc5 = $desc5;

        return $this;
    }

    /**
     * Get desc5
     *
     * @return string 
     */
    public function getDesc5()
    {
        return $this->desc5;
    }

    /**
     * Set desc6
     *
     * @param string $desc6
     * @return annonces
     */
    public function setDesc6($desc6)
    {
        $this->desc6 = $desc6;

        return $this;
    }

    /**
     * Get desc6
     *
     * @return string 
     */
    public function getDesc6()
    {
        return $this->desc6;
    }

    /**
     * Set fichier1
     *
     * @param string $fichier1
     * @return annonces
     */
    public function setFichier1($fichier1)
    {
        $this->fichier1 = $fichier1;

        return $this;
    }

    /**
     * Get fichier1
     *
     * @return string 
     */
    public function getFichier1()
    {
        return $this->fichier1;
    }

    /**
     * Set fichier2
     *
     * @param string $fichier2
     * @return annonces
     */
    public function setFichier2($fichier2)
    {
        $this->fichier2 = $fichier2;

        return $this;
    }

    /**
     * Get fichier2
     *
     * @return string 
     */
    public function getFichier2()
    {
        return $this->fichier2;
    }

    /**
     * Set fichier3
     *
     * @param string $fichier3
     * @return annonces
     */
    public function setFichier3($fichier3)
    {
        $this->fichier3 = $fichier3;

        return $this;
    }

    /**
     * Get fichier3
     *
     * @return string 
     */
    public function getFichier3()
    {
        return $this->fichier3;
    }

    /**
     * Set fichier4
     *
     * @param string $fichier4
     * @return annonces
     */
    public function setFichier4($fichier4)
    {
        $this->fichier4 = $fichier4;

        return $this;
    }

    /**
     * Get fichier4
     *
     * @return string 
     */
    public function getFichier4()
    {
        return $this->fichier4;
    }

    
}
