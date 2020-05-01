<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InquiryController extends AbstractController
{
    /**
     * @Route("/inquiry", name="inquiry")
     */
    public function index()
    {
        return $this->render('inquiry/index.html.twig', [
            'controller_name' => 'InquiryController',
        ]);
    }
}
