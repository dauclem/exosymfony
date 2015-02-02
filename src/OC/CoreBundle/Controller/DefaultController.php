<?php

namespace OC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OCCoreBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        $this->addFlash('info', 'La page de contact n\'est pas encore disponible, merci de revenir plus tard');
        return $this->redirect($this->generateUrl('oc_core_homepage'));
    }
}
