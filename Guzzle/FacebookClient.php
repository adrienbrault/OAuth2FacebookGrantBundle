<?php

namespace FSC\OAuth2FacebookGrantBundle\Guzzle;

use Guzzle\Service\Client;
use Guzzle\Common\Collection;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class FacebookClient extends Client
{
    /**
     * {@inheritdoc}
     *
     * @return static
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => 'https://graph.facebook.com/',
        );
        $config = Collection::fromConfig($config, $default, array());

        $client = new static($config->get('base_url'), $config);

        return $client;
    }
}
