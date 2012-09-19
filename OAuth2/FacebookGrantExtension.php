<?php

namespace FSC\OAuth2FacebookGrantBundle\OAuth2;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use FOS\OAuthServerBundle\Storage\GrantExtensionInterface;
use OAuth2\Model\IOAuth2Client;

use FSC\OAuth2FacebookGrantBundle\Facebook\Facebook;

class FacebookGrantExtension implements GrantExtensionInterface
{
    /**
     * @var UserProviderInterface
     */
    protected $userProvider;

    /**
     * @var Facebook
     */
    protected $facebook;

    public function __construct(UserProviderInterface $userProvider, Facebook $facebook)
    {
        $this->userProvider = $userProvider;
        $this->facebook = $facebook;
    }

    public function checkGrantExtension(IOAuth2Client $client, array $inputData, array $authHeaders)
    {
        if (!isset($inputData['facebook_access_token'])) {
            return false;
        }

        $this->facebook->setAccessToken($inputData['facebook_access_token']);

        try {
            $fbData = $this->facebook->api('/me');
        } catch (\FacebookApiException $e) {
            return false;
        }

        if (empty($fbData) || !isset($fbData['id'])) {
            return false;
        }

        $user = $this->userProvider->loadUserByUsername($fbData['id']);
        if (null === $user) {
            return false;
        }

        return array(
            'data' => $user,
        );
    }
}
