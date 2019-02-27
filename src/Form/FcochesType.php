<?php

namespace App\Form;

use App\Entity\Fcoches;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FcochesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idioma')
            ->add('pocisionMotor', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('distribucion', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('numeroCilindros', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('valvulaCilindro', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('cilindrada', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('potenciaMaxima', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('parMotorMaxima', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('diametroCarrera', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('alimentacion', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('cajaCambio', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('desarrollos', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('marchaAtras', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('grupoFinal', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('traccion', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('suspensionDelantera', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('suspensionTrasera', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('frenosDelanteros', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('frenosTraseros', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('neumaticos', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('llantas', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('tipoDireccion', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('radioGiro', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('vueltasVolanteTope', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('largo', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('ancho', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('alto', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('distanciaEjes', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('viaDelantera', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('viaTrasera', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('peso', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('capacidadMaletero', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('depositoCombustible', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('velocidadMaxima', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('aceleracion', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('consumoUrbano', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('consumoExtraurbano', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('consumoMedio', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('emisiones', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
            ->add('combustible', TextType::class, array('attr' => array('class'=>'form-control'), 'label' => false, 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Fcoches::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_fcoches';
    }
}
