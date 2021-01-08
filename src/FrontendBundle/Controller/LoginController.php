<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    
    public function loginAction()
    {
        // services
        // 
        return $this->render('FrontendBundle:Index:index.html.twig');
    }
}
