<?php

namespace EtoxMicrome\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Template()
     */
    public function homeAction()
    {
        $respuesta = $this->render('FrontendBundle:Default:home.html.twig');
        return $respuesta;
    }
}
