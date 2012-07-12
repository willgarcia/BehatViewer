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
            ->add('name', 'text')
            ->add('slug', 'text')
            ->add('base_url', 'url')
            ->add('output_path', 'text')
            ->add('root_path', 'text')
            ->add('test_command', 'textarea');
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'jubianchi\BehatViewerBundle\Entity\Project',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention' => 'project_item',
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
