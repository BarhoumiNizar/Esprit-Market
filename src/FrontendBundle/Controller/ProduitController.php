<?php
namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\httpFoundation\Request;
use FrontendBundle\Form\produitType;
use FrontendBundle\Entity\produit;

class ProduitController extends Controller

{
    
    public function AjoutPdtAction(Request $request)
    {
    $pdt=new produit();
       $form=$this->createForm(produitType::class,$pdt);
       $form->handleRequest($request);
       if($form->isvalid())
       {
           $cnx=$this->getDoctrine()->getManager();
           $cnx->persist($pdt);
           $cnx->flush();
       }

       return $this->render('FrontendBundle:produit:AjoutPdt.html.twig', array('form'=>$form->createView())); 
    }
}

