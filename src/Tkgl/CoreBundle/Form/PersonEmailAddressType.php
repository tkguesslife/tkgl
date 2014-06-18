<?php

namespace Tkgl\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonEmailAddressType extends AbstractType {

  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder            
            ->add('emailAddressType', null, array('label' =>'Type', 'required' => true))
//            ->add('emailAddress', null, array('label' =>'Email address'))
            ->add('emailAddress')
    ;
  }

  /**
   * @param OptionsResolverInterface $resolver
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
        'data_class' => 'Tkgl\CoreBundle\Entity\PersonEmailAddress'
    ));
  }

  /**
   * @return string
   */
  public function getName() {
    return 'tkgl_corebundle_personemailaddress';
  }

}
