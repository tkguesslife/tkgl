<?php

namespace Tkgl\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DealType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('person', new \Tkgl\CoreBundle\Form\PersonType() )
            ->add('team')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tkgl\CoreBundle\Entity\Deal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tkgl_corebundle_deal';
    }
}
