<?php

namespace jubianchi\BehatViewerBundle\Entity;

abstract class Base
{
    public static function initFromArray(array $values = array())
    {
        $instance = new static();

        foreach ($values as $field => $value) {
            $setter = 'set' . ucfirst($field);
            $this->$setter($value);
        }

        return $instance;
    }
}
