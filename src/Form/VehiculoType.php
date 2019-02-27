<?php

namespace App\Form;

use App\Entity\Vehiculo;
use App\Entity\Clase;
use App\Entity\Marca;
use App\Entity\Tipo;
use App\Entity\Grupo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class VehiculoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clase', EntityType::class, array(
                'class' => Clase::class,
                'attr'=>array('class'=>'form-control input-sm select-style')
            ))
            ->add('marca', EntityType::class, array(
                'class' => Marca::class,
                'attr'=>array('class'=>'form-control input-sm select-style'), 'empty_data' => 'Seleccione - Marca'
            ))
            ->add('tipo', EntityType::class, array(
                'class' => Tipo::class,
                'attr'=>array('class'=>'form-control input-sm select-style'), 'empty_data' => 'Seleccione - Tipo'
            ))
            ->add('grupo', EntityType::class, array(
                'class' => Grupo::class,
                'attr'=> array('class'=>'form-control input-sm select-style'), 'empty_data' => 'Seleccione - Grupo'
            ))
            ->add('modelo', TextType::class, array('attr' => array('placeholder' => 'Modelo', 'class'=>'form-control input-grande')))
            ->add('media', TextType::class, array('attr' => array('placeholder' => 'Media'),'required' => false, 'error_bubbling' => true))
            ->add('canti', TextType::class, array('attr' => array('placeholder' => 'Canti'),'required' => false, 'error_bubbling' => true))
            ->add('fechaInicio', TextType::class, array('attr' => array('placeholder' => 'Año', 'class'=>'form-control input-date'), 'error_bubbling' => true))
            ->add('fechaFin', TextType::class, array('attr' => array('placeholder' => 'Año', 'class'=>'form-control input-date'), 'required' => false, 'error_bubbling' => true))
            ->add('files',CollectionType::class, array('label'=>'Files',
                'entry_type' => FileType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
            ->add('fichas',CollectionType::class, array('label'=>'Fichas',
                    'entry_type' => FichaType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'prototype' => true,
                ))
            ->add('fcoches',CollectionType::class, array('label'=>'Fcoches',
                'entry_type' => FcochesType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Vehiculo::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_vehiculo';
    }
}
