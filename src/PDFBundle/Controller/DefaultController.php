<?php

namespace PDFBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PDFBundle:Default:index.html.twig');
    }
}
