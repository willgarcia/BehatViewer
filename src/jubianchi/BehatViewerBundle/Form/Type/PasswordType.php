<?php

namespace jubianchi\BehatViewerBundle\Form\Type;

use Symfony\Component\Form\FormBuilder,
    Symfony\Component\Form\CallbackValidator,
    Symfony\Component\Form\Form;

/**
 *
 */
class PasswordType extends UserType
{
    /**
     * @param \Symfony\Component\Form\FormBuilder $builder
     * @param array                               $options
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add(
                'oldpassword',
                'password',
                array(
                    'property_path' => false,
                    'label' => 'Old password',
                    'attr' => array(
                        'class' => 'input-xlarge'
                    )
                )
            )
            ->add(
                'password',
                'password',
                array(
                    'label' => 'New password',
                    'attr' => array(
                        'class' => 'input-xlarge'
                    )
                )
            )
            ->add(
                'confirm',
                'password',
                array(
                    'label' => 'Confirm password',
                    'property_path' => false,
                    'attr' => array(
                        'class' => 'input-xlarge'
                    )
                )
            );

        $builder->addValidator(new CallbackValidator(function(Form $form) {
            $password = $form->get('password');
            $confirm = $form->get('confirm');

            if($confirm->getData() !== $password->getData()) {
                $password->addError(new \Symfony\Component\Form\FormError('Passwords are not identical'));
                $confirm->addError(new \Symfony\Component\Form\FormError(''));
            }
        }));
    }
}
