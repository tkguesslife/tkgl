<?php

namespace Tkgl\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')            
            ->add('password', 'password')
            ->add('email')
            ->add('enabled', 'choice', array(
                'choices' => array(true => 'Yes', false => 'No'),
                'required' => false))
            ->add('roles')
            ->add('person', new \Tkgl\CoreBundle\Form\PersonType() )
            ->add('userGroups')            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tkgl\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tkgl_userbundle_user';
    }
}
