<?php

namespace jubianchi\BehatViewerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
    Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('behat_viewer');

        return $treeBuilder;
    }
}
