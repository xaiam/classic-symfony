<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('tel', TextType::class, ['required' => false])
            ->add('type', ChoiceType::class, ['choices' => ['公園について', 'その他'], 'expanded' => true])
            ->add('content', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => '送信'])
            ->getForm();
        return $this->render('Inquiry/index.html.twig', ['form' => $form->createView()]);

    }
}
