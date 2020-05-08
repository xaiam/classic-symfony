<?php

namespace App\Form;

use App\Entity\Inquiry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminInquiryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('processStatus', ChoiceType::class, [choices => ['未対応', '対応中', '対応済',], 'empty_data' => 0, 'expanded' => true,])
            ->add('processMemo', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => '保存',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inquiry::class,
            'validation_groups' => ["admin"]
        ]);
    }
}
