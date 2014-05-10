<?php

namespace Tkgl\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserTeamType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('teamDescription')
            ->add('region')
            ->add('teamUsers')
            ->add('province')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tkgl\UserBundle\Entity\UserTeam'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tkgl_userbundle_userteam';
    }
}
