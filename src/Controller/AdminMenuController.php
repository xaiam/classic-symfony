<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminMenuController extends AbstractController
{
    /**
     * @Route("/admin/")
     */
    public function index()
    {
        return $this->render('Admin/Common/index.html.twig');
    }


}
