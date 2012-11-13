<?php

namespace FSC\OAuth2FacebookGrantBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Config\FileLocator;

class FSCOAuth2FacebookGrantExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        foreach (array('oauth.yml', 'guzzle.yml') as $resource) {
            $loader->load($resource);
        }

        $facebookGrantExtensionDefinition = $container->getDefinition('fsc_oauth2_facebook_grant.grants.facebook');
        $facebookGrantExtensionDefinition->replaceArgument(0, new Reference($config['user_provider']));
        $facebookGrantExtensionDefinition->addTag('fos_oauth_server.grant_extension', array(
            'uri' => $config['uri'],
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'fsc_oauth2_facebook_grant';
    }
}
