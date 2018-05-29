<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 11/05/18
 * Time: 13:07
 */

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isACertifiedPilot', CheckboxType::class, array('label' => 'isACertifiedpilot'))
            ->add('firstName', TextType::class, array('label' => 'form.firstName', 'translation_domain' => 'FOSUserBundle'))
            ->add('lastName', TextType::class, array('label' => 'form.lastName', 'translation_domain' => 'FOSUserBundle'))
            ->add('phoneNumber', TextType::class, array('label' => 'form.phoneNumber', 'translation_domain' => 'FOSUserBundle'))
            ->add('birthDate', DateType::class, array('label' => 'form.birthDate', 'translation_domain' => 'FOSUserBundle'))
            ->add('creationDate', DateType::class, array('label' => 'form.creationDate', 'required' => false, 'translation_domain' => 'FOSUserBundle'))
            ->add('note', IntegerType::class, array('label' => 'form.note', 'required' => false, 'translation_domain' => 'FOSUserBundle'));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}