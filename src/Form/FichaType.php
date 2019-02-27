<?php

namespace App\Form;

use App\Entity\Ficha;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FichaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('longitudTotal', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('idioma')
            ->add('distaciaEjes', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('alturaAsiento', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('capacidadCombustible', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('cilindrada', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('diametroCilindro', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('carreraCilindro', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('relacionCompresion', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('potencia', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('rpm', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('alimentacion', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('encendido', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('arranque', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('embrague', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('chasis', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('suspensionDelantera', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('recorridoSuspension', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('suspensionTrasera', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('frenoDelantero', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('frenoTrasero', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('neumaticoDelantero', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('neumaticoTrasero', TextType::class, array('attr' => array( 'class'=>'form-control'), 'label' => false, 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Ficha::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_ficha';
    }
}
