<?php

namespace AdrienBrault\OAuth2FacebookGrantBundle;

use AdrienBrault\OAuth2FacebookGrantBundle\DependencyInjection\ABOAuth2FacebookGrantExtension;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ABOAuth2FacebookGrantBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new ABOAuth2FacebookGrantExtension();
        }

        return $this->extension;
    }
}
