<?php

namespace App\Controller;

use App\Entity\Inquiry;
use App\Form\CreateSearchFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/inquiry", name="admin_inquiry_list")
 */
class AdminInquiryListController extends AbstractController
{

    /**
     * @Route("/search", name="_index")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(CreateSearchFormType::class);
        $form->handleRequest($request);
        $keyword = '';
        if ($form->isSubmitted() && $form->isValid()) {
            $keyword = $form->get('search')->getData();
        }

        $doctrine = $this->getDoctrine();
        $inquiryRepository = $doctrine->getRepository(Inquiry::class);

        $inquiryList = $inquiryRepository->findAllByKeyword($keyword);
        return $this->render('Admin/Inquiry/index.html.twig', [
            'form' => $form->createView(),
            'inquiryList' => $inquiryList,
        ]);
    }

}
