<?php

namespace App\Controller;

use App\Entity\Inquiry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/inquiry", name="admin_inquiry_list")
 */
class AdminInquiryListController extends AbstractController
{

    /**
     * @Route("/", name="_index")
     */
    public function index()
    {
        $doctrine = $this->getDoctrine();
        $inquiryRepository = $doctrine->getRepository(Inquiry::class);
        $inquiryList = $inquiryRepository->find([], ['id' => 'DESC']);
        return $this->render('Admin/Inquiry/index.html.twig', [
            'inquiryList' => $inquiryList,
        ]);
    }
}
