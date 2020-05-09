<?php

namespace App\Controller;

use App\Entity\Inquiry;
use App\Form\AdminInquiryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/admin/inquiry", name="admin_inquiry")
 */
class AdminInquiryEditController extends AbstractController
{

    /**
     * @Route("/{id}/edit", methods={"GET", "POST"}, name="_edit")
     * @param Inquiry $inquiry
     */
    public function edit(Request $request, Inquiry $inquiry)
    {
        $form = $this->createForm(AdminInquiryFormType::class, $inquiry);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('admin_inquiry_input');
        }

        return $this->render(
            'Admin/Inquiry/edit.html.twig',
            [
                'form' => $form->createView(),
                'inquiry' => $inquiry,
            ]
        );
    }

}
