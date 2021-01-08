<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontendBundle\Entity\positioner;
class MainController extends Controller
{
    public function indexAction()
    {
       $cnx=$this->getDoctrine()->getManager();
       $res=$cnx->getRepository('FrontendBundle:positioner')->findAll();
        return $this->render('FrontendBundle:Index:index.html.twig',array('res'=>$res));
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:About:about.html.twig');
    }

}
