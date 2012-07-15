<?php

namespace jubianchi\BehatViewerBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder;

/**
 *
 */
class ProjectType extends AbstractType
{
    /**
     * @param \Symfony\Component\Form\FormBuilder $builder
     * @param array                               $options
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Project name',
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add('slug', 'text', array(
                'label' => 'Identifier',
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add('base_url', 'url', array(
                'label' => 'Base URL',
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add('output_path', 'text', array(
                'label' => 'Output path',
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add('root_path', 'text', array(
                'label' => 'Root path',
                'attr' => array(
                    'class' => 'input-xlarge'
                )
            ))
            ->add('test_command', 'textarea', array(
                'label' => 'Test command',
                'attr' => array(
                    'rows' => 10,
                    'cols' => 100,
                    'style' => 'width: auto'
                )
            ));
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class'      => 'jubianchi\BehatViewerBundle\Entity\Project',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention'       => 'project_item',
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Project';
    }
}
