<?php

namespace Tkgl\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonPhoneNumberType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('phoneNumberType', null, array('label' =>'Type', 'required' => true))
            ->add('phoneNumber')                        
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tkgl\CoreBundle\Entity\PersonPhoneNumber'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tkgl_corebundle_personphonenumber';
    }
}
