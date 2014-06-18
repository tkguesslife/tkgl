<?php

namespace Tkgl\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AppointmentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('attendees', 'text', array('required' => false, 'label' => 'Attendees',  'attr' => array('class' => 'input-block-level attendees')))
            ->add('subject', 'text', array('required' => false
                                                          ,'attr' => array('class' => 'input-block-level')))
            ->add('location', 'text', array('required' => false, 'attr' => array('class' => 'input-block-level')))
            ->add('appointmentDescription', 'textarea', array('label' =>'Description', 'required' => false , 'attr' => array('class' => 'input-block-level')))
            ->add('startTime', 'datetime', array('label' => 'Start time',
                                        'required' => false,
                                        'widget' => 'single_text',                                       
                                        'attr' => array('class' => 'appendDateTime ',
                                                                  'data-format'=>"yyyy-MM-dd hh:mm")
                                        ,
                                        'label_attr' => array(
                                            'class' => 'control-label'
                                        )
                                        ))
            ->add('endTime')
            ->add('duration', 'choice', array(
                'choices' => array(
                    '30' => '30min',
                    '60' => '1hr',
                    '90' => '1.5hr',
                    '120' => '2hrs',
                    '180' => '3hrs',
                    '240' => '4hrs',
                    '300' => '5hrs',
                ),
                    'label_attr' => array(
                        'class' => 'control-label'
                    )
               ))          
            ->add('appointmentStatus')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tkgl\CoreBundle\Entity\Appointment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tkgl_corebundle_appointment';
    }
}
