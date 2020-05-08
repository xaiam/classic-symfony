<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/inquiry")
 */
class AdminInquiryListController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index()
    {
        $doctrine = $this->getDoctrine();
        $inquiryRepository = $doctrine->getRepository('App/Entity/Inquiry');
        $inquiryList = $inquiryRepository->findAll();
        return $this->render('Admin/Inquiry/index.html.twig', [
            'inquiryList' => $inquiryList,
        ]);
    }
}
