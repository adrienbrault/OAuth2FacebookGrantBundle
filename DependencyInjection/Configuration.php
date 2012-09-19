<?php

namespace FSC\OAuth2FacebookGrantBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fsc_oauth2_facebook_grant');

        $rootNode
            ->children()
                ->scalarNode('user_provider')->end()
                ->scalarNode('uri')->defaultValue('http://grants.api.thefootballsocialclub.com/facebook_access_token')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
