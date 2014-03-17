<?php

namespace AdrienBrault\OAuth2FacebookGrantBundle\Tests\Functional;

use AdrienBrault\FacebookClientBundle\ABFacebookClientBundle;
use AdrienBrault\OAuth2FacebookGrantBundle\ABOAuth2FacebookGrantBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    public function __construct()
    {
        parent::__construct('dev', true);
    }

    public function registerBundles()
    {
        return array(
            new FrameworkBundle(),
            new ABFacebookClientBundle(),
            new ABOAuth2FacebookGrantBundle(),
        );
    }

    public function getCacheDir()
    {
        return sys_get_temp_dir().'/AdrienBraultFacebookClientBundle/';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config.yml');
    }
}
