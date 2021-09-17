<?php

namespace App\Form;

use App\Entity\EnderecamentoPostal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class EnderecamentoPostalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cep', NumberType::class, array('label'=>'CEP', 'attr'=>array('id'=>'cep', 'value'=>'', 'minlength'=>'8', 'maxlength'=>'8','class'=>'form-control')))
            ->add('logradouro', TextType::class, array('label'=>'Rua','attr'=>array('class'=>'form-control')))
            ->add('complemento', HiddenType::class, array('label'=>'Complemento','attr'=>array('class'=>'form-control')))
            ->add('bairro', TextType::class, array('label'=>'Bairro','attr'=>array('class'=>'form-control')))
            ->add('localidade', TextType::class, array('label'=>'Localidade','attr'=>array('class'=>'form-control')))
            ->add('uf', TextType::class, array('label'=>'UF', 'attr'=>array('class'=>'form-control')))
            ->add('ibge', NumberType::class, array('label'=>'IBGE', 'attr'=>array('class'=>'form-control')))
            ->add('gia', HiddenType::class, array('label'=>'GIA', 'attr'=>array('class'=>'form-control')))
            ->add('ddd', HiddenType::class, array('label'=>'DDD', 'attr'=>array('class'=>'form-control')))
            ->add('siafi', HiddenType::class, array('label'=>'SIAFI', 'attr'=>array('class'=>'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EnderecamentoPostal::class,
        ]);
    }
}
