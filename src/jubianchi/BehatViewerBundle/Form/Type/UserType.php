<?php

namespace jubianchi\BehatViewerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

/**
 *
 */
abstract class UserType extends AbstractType
{
    /**
     * @param array $options
     *
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class'      => 'jubianchi\BehatViewerBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention'       => 'user_item',
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
