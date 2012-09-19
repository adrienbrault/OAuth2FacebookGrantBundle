<?php

namespace FSC\OAuth2FacebookGrantBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use FSC\OAuth2FacebookGrantBundle\DependencyInjection\FSCOAuth2FacebookGrantExtension;

class FSCOAuth2FacebookGrantBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new FSCOAuth2FacebookGrantExtension();
        }

        return $this->extension;
    }
}
