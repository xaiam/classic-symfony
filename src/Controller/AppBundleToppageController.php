<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppBundleToppageController extends AbstractController
{
    /**
     * @Route("/", name="toppage")
     */
    public function indexAction()
    {
        return $this->render('Toppage/index.html.twig');
    }
}
