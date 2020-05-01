<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/inquiry", name="inquiry_")
 */
class InquiryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * $Method("get")
     */
    public function indexAction()
    {
//        $form = $this->createFormBuilder()
//            ->add('name', TextType::class, ['label' => '名前'])
//            ->add('email', TextType::class)
//            ->add('tel', TextType::class, ['required' => false])
//            ->add('type', ChoiceType::class, ['choices' => ['公園について' => true, 'その他' => true], 'expanded' => true])
//            ->add('content', TextareaType::class)
//            ->add('submit', SubmitType::class, ['label' => '送信'])
//            ->getForm();
        return $this->render('Inquiry/index.html.twig', ['form' => $this->createInquiryForm()->createView()]);

    }

    private function createInquiryForm()
    {
        return $this->createFormBuilder()
        ->add('name', TextType::class)
        ->add('email', TextType::class)
        ->add('tel', TextType::class, ['required' => false])
        ->add('type', ChoiceType::class, [choices => ['公園について' => true, 'その他' => true,], 'expanded' => true])
        ->add(content, TextareaType::class)
        ->add('submit', SubmitType::class, ['label' => '送信',])
        ->getForm();
    }

    /**
     * $Route("/complete")
     */
    private function completeAction()
    {
        return $this->render('Inquiry/complete.html.twig');
    }

    /**
     * @Route("/")
     */
    public function indexPostAction(Request $request)
    {
        $form = $this->createInquiryForm();
        $form->handleRequest($request);
        if ($form->isValid()){
            return $this->redirect(
                $this->generateUrl('app_inquiry_complete'));
        }
    }
}
