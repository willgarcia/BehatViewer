<?php

namespace jubianchi\BehatViewerBundle\Form\Type;

use Symfony\Component\Form\FormBuilder,
    Symfony\Component\Form\CallbackValidator,
    Symfony\Component\Form\Form;

/**
 *
 */
class EditUserType extends UserType
{
    private $passwordRequired;
    private $allowActive;

    function __construct($passwordRequired = true, $allowActive = true)
    {
        $this->passwordRequired = $passwordRequired;
        $this->allowActive = $allowActive;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilder $builder
     * @param array                               $options
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add('email', 'email', array(
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add(
                'password',
                'password',
                array(
                    'label' => 'New password',
                    'required' => $this->passwordRequired,
                    'property_path' => false,
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
                    'required' => $this->passwordRequired,
                    'property_path' => false,
                    'attr' => array(
                        'class' => 'input-xlarge'
                    )
                )
            )
        ;

        if(true === $this->allowActive) {
            $builder->add(
                'isActive',
                'choice',
                array(
                    'label' => 'Active',
                    'required' => true,
                    'choices' => array(
                        '1' => 'Yes',
                        '0' => 'No',
                    )
                )
            );
        }

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
