<?php
namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\httpFoundation\Request;
use FrontendBundle\Form\annoncesType;
use FrontendBundle\Entity\annonces;
use FrontendBundle\Entity\sauvegarder;
use FrontendBundle\Entity\positioner;
use FrontendBundle\Entity\Vus;
use FrontendBundle\Entity\likes;
use userBundle\Entity\user;
class AnnoncesController extends Controller

{
  public function getUploadDir()
  {

      return 'bundles/fichier_Annonces/';
  }
    public function AjoutAction()
    {
        $user=$this->getUser();
        //echo 'test '.$user;
        if($user==null)
       {return $this->redirect($this->generateURL('fos_user_security_login'));}
   else{ 
     /************************************* */
  $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $tofind=".";
  $host = substr("$hostname",0,strpos($hostname,$tofind)); //pour recupere le nom sans le suffixe DNS
  $ip = gethostbyname($hostname);
  


  /*************************** */
       $annonce=new annonces();
       $cnx=$this->getDoctrine()->getManager();
       $position=$cnx->getRepository('FrontendBundle:positioner')->findAll();
       $form=$this->createForm(annoncesType::class);
       //$form->handleRequest($request);
       $request=$this->get('request');
      if($request->isMethod('POST'))
       {
        $categorie=$request->get('categorie');
         /* if($categorie!='evenemment')
          {
            $titre=$request->get('titre');
          }
          else 
          {*/
            $titre=$request->get('titre');
          //}
           $date=$request->get('date_annonce');
           $coord_ville=$request->get('coord_ville');
           $niveau=$request->get('niveau');
           $desc1=$request->get('desc1');
           $desc2=$request->get('desc2');
           $desc3=$request->get('desc3');
           $desc4=$request->get('desc4');
           $desc5=$request->get('desc5');
           $desc6=$request->get('desc6');
           $prix=$request->get('prix');
           $offre=$request->get('offre');
          
           //$image=$request->get('image');
           $date_debut=$request->get('date_debut');
           $date_fin=$request->get('date_fin');
           $time_debut=$request->get('time_debut');
           $time_fin=$request->get('time_fin');
           $ville=$request->get('ville');
           $email=$request->get('email');
           $tel=$request->get('tel');
           $id=$request->get('id');
           $name=$request->get('name');
           $url=$_FILES['photo']['tmp_name'];
           $url1=$_FILES['photo1']['tmp_name'];
           $url2=$_FILES['photo2']['tmp_name'];
           $url3=$_FILES['photo3']['tmp_name'];
           $url4=$_FILES['photo4']['tmp_name'];
           $photo=$_FILES['photo']['name'];
           $photo1=$_FILES['photo1']['name'];
           $photo2=$_FILES['photo2']['name'];
           $photo3=$_FILES['photo3']['name'];
           $photo4=$_FILES['photo4']['name'];
        
           $annonce->setDesc1($desc1);
           $annonce->setDesc2($desc2);
           $annonce->setDesc3($desc3);
           $annonce->setDesc4($desc4);
           $annonce->setDesc5($desc5);
           $annonce->setDesc6($desc6);
           $annonce->setDateAnnonce($date);
           $annonce->setTitre($titre);
           $annonce->setNiveau($niveau);
           $annonce->setPrix($prix);
           $annonce->setOffre($offre);
         
          // $annonce->setDescription($image);
           $annonce->setDebutEvenement($date_debut);
           $annonce->setFinEvenement($date_fin);
           $annonce->setHeureDebut($time_debut);
           $annonce->setHeureFin($time_fin);
           $annonce->setVille($ville);
           $annonce->setCoordVille($coord_ville);
           $annonce->setEmailUser($email);
           $annonce->setIdUser($id);
           $annonce->setTelUser($tel);
           $annonce->setUser($name);
           $annonce->setFichier($photo);
           $annonce->setFichier1($photo1);
           $annonce->setFichier2($photo2);
           $annonce->setFichier3($photo3);
           $annonce->setFichier4($photo4);
           $annonce->setEtat('0');
           $annonce->setCategorieAnnonce($categorie);
          
         // $annonce->Upload();
         @copy($url,$this->getUploadDir().$photo);
         @copy($url1,$this->getUploadDir().$photo1);
         @copy($url2,$this->getUploadDir().$photo2);
         @copy($url3,$this->getUploadDir().$photo3);
         @copy($url4,$this->getUploadDir().$photo4);
        // echo $titre;
         $cnx->persist($annonce);
        $cnx->flush();
         return $this->render('FrontendBundle:User:success.html.twig',array('categorie'=>$categorie)); 
          
          
       }

       return $this->render('FrontendBundle:Annonces:deposerAnnonce.html.twig', array('form'=>$form->createView(),'position'=>$position,'ip'=>$ip)); 
      }
    }
    
    public function getAnnoncesAction()
    {
      $cnx=$this->getDoctrine()->getManager();
      $annonces=$cnx->getRepository('FrontendBundle:annonces')->findAll();
      $res_Vus=$cnx->getRepository('FrontendBundle:Vus')->findAll();
        if($this->getUser()==null)
        {
       
        
        $res=$cnx->getRepository('FrontendBundle:positioner')->findAll();
      
       // $annonces=$cnx->getRepository('FrontendBundle:annonces')->findAll();
        //pour categorie evenement
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
       
        return $this->render('FrontendBundle:Annonces:annonces.html.twig',array('resultat'=>$annonces,'res'=>$res,'cat'=>$cat,'nbev'=>$nbeven,
                                                                                'livre'=>$catlivre,'nblivre'=>$nblivre,
                                                                                'Cours'=>$catcours,'nbcours'=>$nbcours,
                                                                                'Telephone'=>$catTelephone,'nbTelephone'=>$nbTelephone,
                                                                                'PC'=>$catPC_portable,'nbpc'=>$nbPC_portable,
                                                                                'Application'=>$catApplication,'nbApplication'=>$nbApplication,
                                                                                'Roubotique'=>$catRoubotique,'nbRoubotique'=>$nbRoubotique,
                                                                                'vs'=>$res_Vus)); 

        }
      else{
        $user=$this->getUser()->getId();
        $username=$this->getUser()->getUsername();
              $cnx=$this->getDoctrine()->getManager();
              $res=$cnx->getRepository('FrontendBundle:positioner')->findAll();
              $sauvegardes=$cnx->getRepository('FrontendBundle:sauvegarder')->findBy(array('user'=>$username));
              $annonces_user=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('id_user'=>$user));
              $resultats_favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('user'=>$username));
              $fv=count($resultats_favoris);
              $row=count($annonces_user);$rows=count($sauvegardes);
              return $this->render('FrontendBundle:Annonces:annonces.html.twig',array('resultat'=>$annonces,'row'=>$row,'rows'=>$rows,'rw'=>$fv,'res'=>$res,'vs'=>$res_Vus)); 

      }

    }
    public function detailAnnonceAction($id)
    {

        $cnx=$this->getDoctrine()->getManager();
        
        /************************************* */
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $tofind=".";
        $host = substr("$hostname",0,strpos($hostname,$tofind)); //pour recupere le nom sans le suffixe DNS
        $ip = gethostbyname($hostname);
    /*************************** */
   
   
    $v=new Vus();
    
        $annonces=$cnx->getRepository('FrontendBundle:annonces')->find($id);
        $anonces=$cnx->getRepository('FrontendBundle:annonces')->findAll();
  
        $img=$annonces->getIdUser();
        $tab=$cnx->getRepository('userBundle:User')->find($img);
        $photo=$tab->getPhoto();
        $res_vus=$cnx->getRepository('FrontendBundle:Vus')->findAll();
        if($this->getUser()!=null)
        {
        $username=$this->getUser()->getUsername();
        $id_user=$this->getUser()->getId();
        ///*******Pour ajouter vu d'annonce */
        $resultat_vu=$cnx->getRepository('FrontendBundle:Vus')->findOneBy(array('annonce'=>$id));
        $rw=count($resultat_vu);
        $row_count=0;
        if($rw==0)
        {$v->setAnnonce($id);
          $v->setIp($ip);
          $v->setNb("1");
          $v->setUser($id_user);
          $cnx->persist($v);
          $cnx->flush();
          return $this->redirectToRoute('backend_detail_annonces',array('id'=>$id));
        return $this->redirectToRoute('backend_detail_annonces');
        }
        // si rw!=0
        else {
          $user=$resultat_vu->getUser();
   //echo $user;
   $perso = explode("|",$user);
 $tester=0;
   for($i=0;$i<count($perso);$i++)
				{
          if($perso[$i]!=$id_user)
          {
          echo  $tester=1;
          

          }
          else {
           echo $tester=0;
          }
         
        }
      //  echo '<br><u>'.$tester.'</u>';

       if($tester>0)
        {
          $nb=$resultat_vu->getNb();
            $q = $cnx->createQueryBuilder()
						->update('FrontendBundle:Vus', 'v')
						->set('v.nb', '?1')
            ->set('v.user', '?2')
						->where('v.annonce = ?3')
            ->setParameter(1, $nb+1)
            ->setParameter(2, $user.'|'.$id_user)
						->setParameter(3, $id)
						
            ->getQuery();
            $p = $q->execute();
            return $this->redirectToRoute('backend_detail_annonces',array('id'=>$id));
            $res_vus=$cnx->getRepository('FrontendBundle:Vus')->findAll();
        }

        

          
        }
       
      
        



        }
        
        // si la personne est déconnecté
        else {
          $row_count=0;
        }
        
     return $this->render('FrontendBundle:Annonces:detailannonce.html.twig',array('resultat'=>$annonces,'test'=>$row_count,'photo'=>$photo,'tab'=>$anonces,'vs'=>$res_vus,'rs_like'=>null)); 
    }


    public function savgarderAction($annonce,$user)
    {
      $sv=new sauvegarder();
     
      //$sv->setAnnonce($annonce);
      $cnx=$this->getDoctrine()->getManager();
      $res=$cnx->find('FrontendBundle:annonces',$annonce);
      $sv->setAnnonce($res);
    $sv->setUser($user);
    
      $cnx->persist($sv);
      $cnx->flush();
      return $this->redirect($this->generateURL('backend_get_annonces'));

    }
    public function getsauvgarderAction()
    {
        $user=$this->getUser()->getUsername();
        $id=$this->getUser()->getId();
      $cnx=$this->getDoctrine()->getManager();
     $resultat=$cnx->getRepository('FrontendBundle:sauvegarder')->findBy(array('user'=>$user));
     $resultats=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('user'=>$user));
     $resultats_favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('user'=>$user));
     $fv=count($resultats_favoris);
     $rows=count($resultat);
     $row=count($resultats);
     return $this->render('FrontendBundle:Annonces:getsauvegardes.html.twig',
                       array('resultat'=>$resultat,'row'=>$row,'rows'=>$rows,'rw'=>$fv));
    }

    public function detailsauvegardeAction($id)
    {
        $cnx=$this->getDoctrine()->getManager(); 
       // $user=$this->getUser()->getUsername();
        $sauvegarder=$cnx->getRepository('FrontendBundle:sauvegarder')->find($id);
      
        return $this->render('FrontendBundle:Annonces:detailannoncesauvegarder.html.twig',array('resultat'=>$sauvegarder)); 
    }

    public function deletesauvegardeAction($id)
    {
        $cnx=$this->getDoctrine()->getManager(); 
       // $user=$this->getUser()->getUsername();
        $resultat=$cnx->getRepository('FrontendBundle:sauvegarder')->find($id);
      $cnx->remove($resultat);
      $cnx->flush();
      return $this->redirect($this->generateURL('backend_getsavegarde_annonces'));

    }

    public function deletefavorisAction($id)
    {
        $cnx=$this->getDoctrine()->getManager(); 
       // $user=$this->getUser()->getUsername();
        $resultat=$cnx->getRepository('FrontendBundle:favoris')->find($id);
      $cnx->remove($resultat);
      $cnx->flush();
      return $this->redirect($this->generateURL('backend_favoris_annonces'));

    }

    public function getfavorisAction()
    {
        $user=$this->getUser()->getUsername();
        $id=$this->getUser()->getId();
      $cnx=$this->getDoctrine()->getManager();
     $resultat=$cnx->getRepository('FrontendBundle:sauvegarder')->findBy(array('user'=>$user));
     $resultats=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('user'=>$user));
     $resultats_favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('user'=>$user));
     $fv=count($resultats_favoris);
     $rows=count($resultat);
     $row=count($resultats);
     
     return $this->render('FrontendBundle:Annonces:favoris.html.twig',
                       array('resultat'=>$resultats_favoris,'row'=>$row,'rows'=>$rows,'rw'=>$fv));
    }

public function modifierAction($id)
             {
              $cnx=$this->getDoctrine()->getManager();
              $detail=$cnx->getRepository('FrontendBundle:annonces')->find($id);
              $position=$cnx->getRepository('FrontendBundle:positioner')->findAll();
              $request=$this->get('request');
              if($request->isMethod('POST'))
               {
                $categorie=$request->get('categorie');
                  if($categorie!='evenemment')
                  {
                    $titre=$request->get('titre');
                  }
                  else 
                  {
                    $titre=$request->get('titre_evenement');
                  }
                   $date=$request->get('date_annonce');
                   $coord_ville=$request->get('coord_ville');
                   $niveau=$request->get('niveau');
                   $desc1=$request->get('desc1');
                   $desc2=$request->get('desc2');
                   $desc3=$request->get('desc3');
                   $desc4=$request->get('desc4');
                   $desc5=$request->get('desc5');
                   $desc6=$request->get('desc6');
                   $prix=$request->get('prix');
                   $offre=$request->get('offre');
                   //$image=$request->get('image');
                   $date_debut=$request->get('date_debut');
                   $date_fin=$request->get('date_fin');
                   $time_debut=$request->get('time_debut');
                   $time_fin=$request->get('time_fin');
                   $ville=$request->get('ville');
                   $email=$request->get('email');
                   $tel=$request->get('tel');
                   $id=$request->get('id');
                   $name=$request->get('name');
                  @ $url=$_FILES['photo']['tmp_name'];
                  @ $url1=$_FILES['photo1']['tmp_name'];
                  @ $url2=$_FILES['photo2']['tmp_name'];
                  @ $url3=$_FILES['photo3']['tmp_name'];
                  @ $url4=$_FILES['photo4']['tmp_name'];
                  @ $photo=$_FILES['photo']['name'];
                  @ $photo1=$_FILES['photo1']['name'];
                  @ $photo2=$_FILES['photo2']['name'];
                  @ $photo3=$_FILES['photo3']['name'];
                  @ $photo4=$_FILES['photo4']['name'];
                   @copy($url,$this->getUploadDir().$photo);
                   @copy($url1,$this->getUploadDir().$photo1);
                   @copy($url2,$this->getUploadDir().$photo2);
                   @copy($url3,$this->getUploadDir().$photo3);
                   @copy($url4,$this->getUploadDir().$photo4);
              //script modification
              $q = $cnx->createQueryBuilder()
                  ->update('FrontendBundle:annonces', 'anc')
                  ->set('anc.titre','?1')
                  ->set('anc.niveau', '?2')
                  ->set('anc.fichier', '?3')
                  ->set('anc.fichier1', '?4')
                  ->set('anc.fichier2', '?5')
                  ->set('anc.fichier3', '?6')
                  ->set('anc.fichier4', '?7')
                  ->set('anc.prix', '?8')
                  ->set('anc.offre', '?9')
                  ->set('anc.ville', '?10')
                  ->set('anc.debut_evenement', '?11')
                  ->set('anc.fin_evenement', '?12')
                  ->set('anc.heure_debut', '?13')
                  ->set('anc.heure_fin', '?14')
                  ->set('anc.desc1', '?15')
                  ->set('anc.desc2', '?16')
                  ->set('anc.desc3', '?17')
                  ->set('anc.desc4', '?18')
                  ->set('anc.desc5', '?19')
                  ->set('anc.desc6', '?20')
                  ->set('anc.coord_ville', '?21')
                  ->set('anc.dateAnnonce', '?22')
                  
                  
                  ->where('anc.id='.$id)
                 
                  ->setParameter(1, $titre)
                  ->setParameter(2, $niveau)
                  ->setParameter(3, $photo)
                  ->setParameter(4, $photo1)
                  ->setParameter(5, $photo2)
                  ->setParameter(6, $photo3)
                  ->setParameter(7, $photo4)
                  ->setParameter(8, $prix)
                  ->setParameter(9, $offre)
                  ->setParameter(10, $ville)
                  ->setParameter(11, $date_debut)
                  ->setParameter(12, $date_fin)
                  ->setParameter(13, $time_debut)
                  ->setParameter(14, $time_fin)
                  ->setParameter(15, $desc1)
                  ->setParameter(16, $desc2)
                  ->setParameter(17, $desc3)
                  ->setParameter(18, $desc4)
                  ->setParameter(19, $desc5)
                  ->setParameter(20, $desc6)
                  ->setParameter(21, $coord_ville)
                  ->setParameter(22, $date)
                  ->getQuery();
                $p = $q->execute();
                return $this->render('FrontendBundle:User:success_modif.html.twig',array('categorie'=>$categorie)); 
                }
              return $this->render('FrontendBundle:Annonces:modifierAnnonce.html.twig', array('position'=>$position,'detail'=>$detail)); 
             }
//Focltion Likes

public function testAnnonceAction($id)
    {

     $cnx=$this->getDoctrine()->getManager();
 /*$lk=new likes();

$annonces=$cnx->getRepository('FrontendBundle:annonces')->find($id);
$anonces=$cnx->getRepository('FrontendBundle:annonces')->findAll();

$img=$annonces->getIdUser();
$tab=$cnx->getRepository('userBundle:User')->find($img);
$photo=$tab->getPhoto();
$res_like=$cnx->getRepository('FrontendBundle:likes')->findAll();
$res_vus=$cnx->getRepository('FrontendBundle:Vus')->findAll();
if($this->getUser()!=null)
{
$username=$this->getUser()->getUsername();
$id_user=$this->getUser()->getId();
///*******Pour ajouter vu d'annonce */
/*$resultat_like=$cnx->getRepository('FrontendBundle:likes')->findOneBy(array('annonce'=>$id));
$rw=count($resultat_like);
$row_count=0;

 


  $nb=$resultat_like->getNbLike();*/
  $tot=0;
    $q = $cnx->createQueryBuilder()
    ->update('FrontendBundle:likes', 'l')
    ->set('l.nbLike', '?1')
   
    ->where('l.annonce = ?2')
    ->setParameter(1, $tot)
   
    ->setParameter(2, $id)
    
    ->getQuery();
    $p = $q->execute();
    return $this->redirect($this->generateURL('backend_detail_annonces',array('id'=>$id)));

}

        // si la personne est déconnecté
       /* else {
          $row_count=0;
        }*/
     // var_dump($resultat_like);
    //return $this->render('FrontendBundle:Annonces:detailannonce.html.twig',array('resultat'=>$annonces,'test'=>$row_count,'photo'=>$photo,'tab'=>$anonces,'vs'=>$res_vus,'rs_like'=>$resultat_like,)); 
    //}
   

    
public function likesAnnonceAction($id)
{

    $cnx=$this->getDoctrine()->getManager();
    
  

$lk=new likes();

    $annonces=$cnx->getRepository('FrontendBundle:annonces')->find($id);
    $anonces=$cnx->getRepository('FrontendBundle:annonces')->findAll();

    $img=$annonces->getIdUser();
    $tab=$cnx->getRepository('userBundle:User')->find($img);
    $photo=$tab->getPhoto();
    $res_like=$cnx->getRepository('FrontendBundle:likes')->findAll();
    $res_vus=$cnx->getRepository('FrontendBundle:Vus')->findAll();
    if($this->getUser()!=null)
    {
    $username=$this->getUser()->getUsername();
    $id_user=$this->getUser()->getId();
    ///*******Pour ajouter vu d'annonce */
    $resultat_like=$cnx->getRepository('FrontendBundle:likes')->findOneBy(array('annonce'=>$id));
    $rw=count($resultat_like);
    $row_count=0;
    if($rw==0)
    {$lk->setAnnonce($id);
     
      $lk->setNbLike("1");
      $lk->setNbDeslike("0");
      $lk->setUser($id_user);
      $cnx->persist($lk);
      $cnx->flush();
      return $this->redirectToRoute('backend_like_annonce',array('id'=>$id));
     //return $this->redirectToRoute('backend_like_annonces',array('id'=>$id,'param'=>$param));
    //return $this->redirectToRoute('backend_detail_annonces');
    }
    // si rw!=0
    else {
      $user=$resultat_like->getUser();
//echo $user;
$perso = explode("|",$user);

for($i=0;$i<count($perso);$i++)
    {
      if($perso[$i]!=$id_user)
      {
      echo  $tester=1;
      

      }
      else {
       echo $tester=0;
      }
     
    }
 echo '<br><u>'.$tester.'</u>';
$x=gettype ($tester);
echo $x;
   if($tester==0 )
    {
     $nb=$resultat_like->getNbLike();
        $q = $cnx->createQueryBuilder()
        ->update('FrontendBundle:likes', 'l')
        ->set('l.nbLike', $nb)
       
        ->where('l.annonce = ?1')
      
        ->setParameter(1, $id)
        
        ->getQuery();
        $p = $q->execute();
        return $this->redirectToRoute('backend_like_annonce',array('id'=>$id));
        //echo $nb+1;
      
       
    }

   
  

      
    }
   
  
    



    }
    
    // si la personne est déconnecté
    else {
      $row_count=0;
    }
    
 return $this->render('FrontendBundle:Annonces:detailannonces.html.twig',array('resultat'=>$annonces,'test'=>$row_count,'photo'=>$photo,'tab'=>$anonces,'vs'=>$res_vus,'rs_like'=>$resultat_like,)); 
}


}

