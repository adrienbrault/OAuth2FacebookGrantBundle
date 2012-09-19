<?php

namespace FSC\OAuth2FacebookGrantBundle\Facebook;

/**
 * Facebook stub to only make api calls with a specific token
 */
class Facebook extends \BaseFacebook
{
    /**
     * {@inheritdoc}
     */
    protected function setPersistentData($key, $value)
    {

    }

    /**
     * {@inheritdoc}
     */
    protected function getPersistentData($key, $default = false)
    {

    }

    /**
     * {@inheritdoc}
     */
    protected function clearPersistentData($key)
    {

    }

    /**
     * {@inheritdoc}
     */
    protected function clearAllPersistentData()
    {

    }
}
