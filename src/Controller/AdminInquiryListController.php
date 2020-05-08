<?php

namespace App\Controller;

use App\Entity\Inquiry;
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
        $inquiryRepository = $doctrine->getRepository(Inquiry::class);
        $inquiryList = $inquiryRepository->findAll();
        return $this->render('Admin/Inquiry/index.html.twig', [
            'inquiryList' => $inquiryList,
        ]);
    }
}
