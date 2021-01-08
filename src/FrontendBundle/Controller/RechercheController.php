<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontendBundle\Entity\annonces;
class RechercheController extends Controller
{
    public function rechercheAction()
    {
       
       if($this->getUser()==null)
       {
        $cnx=$this->getDoctrine()->getManager();
        $res_pos=$cnx->getRepository('FrontendBundle:positioner')->findAll();
        $evenements=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'evenemment'));
        $nbeven=count($evenements);
        $cat='évennement';
        //pour categorie livres
        $livres=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'livre'));
        $nblivre=count($livres);
        $catlivre='Livre';
        //pour categorie cours
        $cours=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'cours'));
        $nbcours=count($cours);
        $catcours='cours';
        //pour categorie tel
        $Telephone=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'Telephone'));
        $nbTelephone=count($Telephone);
        $catTelephone='Telephone';
        //pour categorie pcportable
        $PC_portable=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'PC_portable'));
        $nbPC_portable=count($PC_portable);
        $catPC_portable='PC portable';
        //pour categorie application
        $Application=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'Application'));
        $nbApplication=count($Application);
        $catApplication='Application';
        //pour categorie roubotique
        $Roubotique=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>'Roubotique'));
        $nbRoubotique=count($Roubotique);
        $catRoubotique='Roubotique';
       
       
       $req=$this->get('request');
       //categories
       $categorie=$req->get('categorie');
       $lieu=$req->get('lieu');
       $cle=$req->get('cle');
      $res=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>$categorie));
      $row=count($res);
        return $this->render('FrontendBundle:Recherche:annonces.html.twig',array('resultat'=>$res,'res'=>$res_pos,'cat'=>$cat,'nbev'=>$nbeven,
                                                                                'livre'=>$catlivre,'nblivre'=>$nblivre,'row'=>$row,
                                                                                'Cours'=>$catcours,'nbcours'=>$nbcours,
                                                                                'Telephone'=>$catTelephone,'nbTelephone'=>$nbTelephone,
                                                                                'PC'=>$catPC_portable,'nbpc'=>$nbPC_portable,
                                                                                'Application'=>$catApplication,'nbApplication'=>$nbApplication,
                                                                                'Roubotique'=>$catRoubotique,'nbRoubotique'=>$nbRoubotique));
   
       }
       else{
        $user=$this->getUser()->getId();
        //Recupération formulaire
        $req=$this->get('request');
        //categories
        $categorie=$req->get('categorie');
        $lieu=$req->get('lieu');
        $cle=$req->get('cle');
        //fin formulaire
        $username=$this->getUser()->getUsername();
              $cnx=$this->getDoctrine()->getManager();
              $res_pos=$cnx->getRepository('FrontendBundle:positioner')->findAll();
              $sauvegardes=$cnx->getRepository('FrontendBundle:sauvegarder')->findBy(array('user'=>$username));
              $annoncesuser=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('user'=>$username));
             if($categorie!=null and $lieu!=null and $cle!=null)
             {
              $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>$categorie,'ville'=>$lieu,'offre'=>$cle));
             }
             else if($categorie!=null and $lieu!=null)
             {
                $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>$categorie,'ville'=>$lieu)); 
             }
             else if($categorie!=null and $cle!=null)
             {
                $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>$categorie,'offre'=>$cle)); 
             }
             else if($lieu!=null and $cle!=null)
             {
                $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('ville'=>$lieur,'offre'=>$cle)); 
             }
             else if($categorie!=null)
             {
                $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('categorieAnnonce'=>$categorie)); 
             }
             
             else if($lieu!=null)
             {
                $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('ville'=>$lieu)); 
             }
             else if($cle!=null)
             {
                $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('offre'=>$cle)); 
             }
             
              $resultats_favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('user'=>$username));
              $fv=count($resultats_favoris);
              $row=count($annonces);
              $rowuser=count($annoncesuser);
              $rows=count($sauvegardes);
             // echo '<h1>'.$row.'</h1>';
           return $this->render('FrontendBundle:Recherche:annonces.html.twig',array('resultat'=>$annonces,'res'=>$res_pos,'row'=>$row,'row_user'=>$rowuser,'rows'=>$rows,'rw'=>$fv)); 

       }
                
    
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:About:about.html.twig');
    }

}
