<?php
namespace jubianchi\BehatViewerBundle\Extension\Doctrine;

use \Doctrine\ORM\Event\LoadClassMetadataEventArgs,
    \Doctrine\ORM\Mapping\ClassMetadataInfo;

/**
 *
 */
class BehatViewerTablePrefix implements \Doctrine\Common\EventSubscriber
{
    /**
     * @var string
     */
    protected $prefix;

    /**
     * @param string $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = (string) $prefix;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array('loadClassMetadata');
    }

    /**
     * @param \Doctrine\ORM\Event\LoadClassMetadataEventArgs $args
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        $classMetadata = $args->getClassMetadata();

        if (strpos($classMetadata->namespace, 'BehatViewerBundle') !== false) {
            $classMetadata->setPrimaryTable(array('name' => $this->prefix . $classMetadata->getTableName()));

            $mappings = $classMetadata->getAssociationMappings();
            foreach ($mappings as $fieldName => $mapping) {
                if ($mapping['type'] == ClassMetadataInfo::MANY_TO_MANY && isset($classMetadata->associationMappings[$fieldName]['joinTable']['name'])) {
                    $mappedTableName = $classMetadata->associationMappings[$fieldName]['joinTable']['name'];
                    $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
                }
            }
        }
    }
}
