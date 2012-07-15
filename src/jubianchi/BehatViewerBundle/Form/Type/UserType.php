<?php

namespace jubianchi\BehatViewerBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder;

/**
 *
 */
class UserType extends AbstractType
{
    private $passwordRequired = true;

    public function setPasswordRequired($required = true)
    {
        $this->passwordRequired = $required;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilder $builder
     * @param array                               $options
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username', 'text')
            ->add('email', 'email')
            ->add('password', 'password', array('required' => $this->passwordRequired));
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'jubianchi\BehatViewerBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention' => 'user_item',
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'User';
    }
}
