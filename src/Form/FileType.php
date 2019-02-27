<?php

namespace App\Form;

use App\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, array('required' => false, 'error_bubbling' => true))
            ->add('titulo',TextType::class, array('required' => false, 'error_bubbling' => true))
            ->add('idioma',TextType::class, array('required' => false, 'error_bubbling' => true))
            ->add('tipo',TextType::class, array('required' => false, 'error_bubbling' => true))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => File::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_file';
    }
}
