<?php

namespace Tkgl\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('gender')
                ->add('firstName')
                ->add('secondName')
                ->add('lastName')
                ->add('companyName')
                ->add('idnumber', null, array('label' => 'Id number'))
                ->add('passportNumber')
                ->add('dateOfBirth', 'datetime', array(
                    'required' => false,
                    'widget' => 'single_text',
                    'attr' => array('class' => 'datepicker',
                        'data-format' => "yyyy-MM-dd")))
                ->add('personEmailAddresses', 'collection', array(
                    'error_bubbling' => true,
                    'type' => new PersonEmailAddressType(),
                    'allow_add' => true,
                    'allow_delete' => true,))
                ->add('personPhoneNumbers', 'collection', array(
                    'error_bubbling' => false,
                    'type' => new PersonPhoneNumberType(),
                    'allow_add' => true,
                    'allow_delete' => true,))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Tkgl\CoreBundle\Entity\Person'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'tkgl_corebundle_person';
    }

}
