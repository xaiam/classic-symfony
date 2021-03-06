<?php

namespace App\Controller;

use App\Entity\Inquiry;
use App\Form\InqueryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * @Route("/inquiry")
 */
class InquiryController extends AbstractController
{

    /**
     * @Route("/", methods={"GET"})
     */
    public function indexAction()
    {
        return $this->render('Inquiry/index.html.twig', ['form' => $this->createInquiryForm()->createView()]);

    }

    private function createInquiryForm()
    {
        return $this->createForm(InqueryFormType::class);
    }

    /**
     * @Route("/complete")
     */
    public function completeAction()
    {
        return $this->render('Inquiry/complete.html.twig');
    }

    /**
     * @Route("/", methods={"POST"})
     */
    public function indexPostAction(Request $request, \Swift_Mailer $mailer)
    {
        // ここで既にentityはInquiryFormTypeクラスにバインディングされている
        $form = $this->createInquiryForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inquiry = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($inquiry);
            $em->flush();

            $message = (new \Swift_Message('Webサイトからのお問い合わせ'))
                ->setFrom('webmaster@example.com')
                ->setTo('admin@example.com')
                ->setBody(
                    $this->renderView('mail/inquiry.txt.twig', ['data' => $inquiry])
                );

            $mailer->send($message);

            return $this->redirectToRoute('app_inquiry_complete');
        }

        return $this->render('Inquiry/index.html.twig',[
            'form' => $form->createView()]);
    }
}
