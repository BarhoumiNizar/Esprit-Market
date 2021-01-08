<?php
namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\httpFoundation\Request;
use FrontendBundle\Form\produitType;
use userBundle\Entity\user;
use FrontendBundle\Entity\annonces;
class UserController extends Controller

{
    
    public function BackendAction()
    {
        if($this->getUser()==null)
        {return $this->redirect($this->generateURL('fos_user_security_login'));}
        else if($this->getUser()->getEtat()=='0')
           {echo "<script>alert('votre compte est désactivé')</script>";}
        else{

      $user=$this->getUser()->getId();
      $username=$this->getUser()->getUsername();
            $cnx=$this->getDoctrine()->getManager();
            $sauvegardes=$cnx->getRepository('FrontendBundle:sauvegarder')->findBy(array('user'=>$username));
            $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('id_user'=>$user));
            $resultats_favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('user'=>$username));
            $fv=count($resultats_favoris);
            $row=count($annonces);$rows=count($sauvegardes);
    
        
      return $this->render('FrontendBundle:User:index.html.twig',array('row'=>$row,'rows'=>$rows,'rw'=>$fv)); 

        }
    }

    public function SucessAction()
    {
        if($this->getUser()==null)
        {return $this->redirect($this->generateURL('fos_user_security_login'));}
    else
    {
        $request=$this->get('request');
        $categorie=$request->get('categorie');
        if($categorie=='evenemment')
        {
          $titre=$request->get('titre_evenement');
        }
        else 
        {$titre=$request->get('titre');}
         $date=$request->get('date_annonce');
         
         $niveau=$request->get('niveau');
         $description=$request->get('description');
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
         $photo=$_FILES['photo']['name'];
        
      
      
         $annonce->setDescription($description);
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
         $annonce->setEmailUser($email);
         $annonce->setIdUser($id);
         $annonce->setTelUser($tel);
         $annonce->setUser($name);
         $annonce->setFichier($photo);
         $annonce->setEtat('0');
         $annonce->setCategorieAnnonce($categorie);
         $cnx=$this->getDoctrine()->getManager();
        $cnx->persist($annonce);
         $cnx->flush();
       return $this->render('FrontendBundle:User:success.html.twig'); 

        }
    }
    public function MesAnnoncesAction()
    {
        if($this->getUser()==null)
        {return $this->redirect($this->generateURL('fos_user_security_login'));}
        else{

            $user=$this->getUser()->getId();
            $username=$this->getUser()->getUsername();
            $cnx=$this->getDoctrine()->getManager();
            $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('id_user'=>$user));
            $row=count($annonces);
            $sauvegardes=$cnx->getRepository('FrontendBundle:sauvegarder')->findBy(array('user'=>$username));
            $annonces=$cnx->getRepository('FrontendBundle:annonces')->findBy(array('id_user'=>$user));
            $resultats_favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('user'=>$username));
            $fv=count($resultats_favoris);
            $rows=count($sauvegardes);
    //echo $user;
        
      

        }
        return $this->render('FrontendBundle:User:mes_annonces.html.twig',array('resultat'=>$annonces,'row'=>$row,'rows'=>$rows,'rw'=>$fv)); 
    }
    public function deleteAnnonceAction($id)
    {
        if($this->getUser()==null)
        {
            return $this->redirect($this->generateURL('fos_user_security_login'));}
        else{
            $cnx=$this->getDoctrine()->getManager();
            $delete=$cnx->find('FrontendBundle:annonces',$id) ;
            $favoris=$cnx->getRepository('FrontendBundle:favoris')->findBy(array('annonce'=>$id));
            $sauvegarder=$cnx->getRepository('FrontendBundle:sauvegarder')->findByAnnonce(array('id'=>$id));
            $cnx->remove($delete);
            /*$cnx->remove($favoris);
            $cnx->remove($sauvegarder);*/
            $cnx->flush();
          
            


    
        
       return $this->redirect($this->generateURL('backend_mes_annonces')); 
        }
    }

    public function desactiver_compteAction()
    {
        if($this->getUser()==null)
        {return $this->redirect($this->generateURL('fos_user_security_login'));}
        else{
            $request=$this->get('request');
            if($request->isMethod('POST'))
            {
                $etat=$request->get('etat');
                //echo 'Etat de desactivation est : '.$etat;
                $user=$this->getUser()->getId();
                echo 'User = '.$user;
                //pour desactiver compte
                $cnx=$this->getDoctrine()->getManager();
                $q = $cnx->createQueryBuilder()
                      ->update('userBundle:user', 'us')
                      ->set('us.etat', '?1')
                      
                      ->where('us.id = ?2')
                      ->setParameter(1, $etat)
                      ->setParameter(2, $user)
                      ->getQuery();
                  $p = $q->execute();
                  if($etat=='0')
                  {return $this->redirect($this->generateURL('fos_user_security_logout'));}
                  else if($etat=='1')
                  {return $this->redirect($this->generateURL('backend_accueil'));}
            }
     
       return $this->render('FrontendBundle:User:desactiver.html.twig'); 

        }
    }
    public function EnregistrerAction()
    {
      $this->getUser()==null;
           
    
        
       return $this->redirect($this->generateURL('fos_user_security_login')); 
    }
    public function getUploadDir()
    {

        return 'bundles/Photo_Users/';
    }
    
    public function UpdateUserAction()
    {
        
        $request=$this->get('request');
        $name=$request->get('username');
        $email=$request->get('email');
        $tel=$request->get('tel');
        $photo=$request->get('photo');
        $id=$request->get('id');
        $img=$request->get('img');
        $url=$_FILES['photo']['tmp_name'];
        $photo=$_FILES['photo']['name'];
         if($photo==null)
       { $photo=$img;
           echo $photo;}
@copy($url,$this->getUploadDir().$photo);
 $cnx=$this->getDoctrine()->getManager();
	  $q = $cnx->createQueryBuilder()
			->update('userBundle:user', 'us')
			->set('us.username', '?1')
			->set('us.email', '?2')
            ->set('us.tel', '?3')
            ->set('us.photo', '?4')
			->where('us.id = ?5')
			->setParameter(1, $name)
			->setParameter(2, $email)
            ->setParameter(3, $tel)
            ->setParameter(4, $photo)
            ->setParameter(5, $id)
			->getQuery();
		$p = $q->execute();
        return $this->redirect($this->generateURL('backend_accueil'));
       
       
    }
}

