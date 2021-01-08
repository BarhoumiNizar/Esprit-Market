<?php
namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\httpFoundation\Request;
use FrontendBundle\Form\commandeType;
use FrontendBundle\Entity\commande;

class CommandeController extends Controller

{
    
    public function AjoutCmdAction(Request $request)
    {
    $cmd=new commande();
       $form=$this->createForm(commandeType::class,$cmd);
       $form->handleRequest($request);
       if($form->isvalid())
       {
           $cnx=$this->getDoctrine()->getManager();
           $cnx->persist($cmd);
           $cnx->flush();
       }

       return $this->render('FrontendBundle:commande:AjoutCmd.html.twig', array('form'=>$form->createView())); 
    }
}

