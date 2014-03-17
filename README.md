# FSCOAuth2FacebookGrantBundle

With this bundle, you can request an access token on your api (that uses FOSOAuthServerBundle) against a facebook access token.
This bundle will check that the facebook access token is valid, and get the fb_id of the user.

For example: you have an iOS app that needs a token to authenticate a user against your api, but you want to only show the Facebook SSO authentication to your user.

## Installation

Add the bundle to your AppKernel

```php
class AppKernel extends Kernel
    public function registerBundles()
        {
            $bundles = array(
                ...
                new AdrienBrault\OAuth2FacebookGrantBundle\ABOAuth2FacebookGrantBundle(),
```

Configure the bundle:

```php
ab_oauth2_facebook_grant:
    user_provider: bundle.facebook_user_provider
    uri: "http://grants.yourapi.com/facebook_access_token"
```

And implement your `bundle.facebook_user_provider` like this:

```php
<?php

namespace AdrienBrault\Core\UserBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

use FSC\Core\UserBundle\Manager\UserManager;

class FacebookUserProvider implements UserProviderInterface
{
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function loadUserByUsername($facebookId)
    {
        $userRepository = $this->userManager->getRepository();

        return $userRepository->findOneBy(array(
            'facebookID' => $facebookId,
        ));
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }

        return $this->loadUserByUsername($user->getFacebookID());
    }

    public function supportsClass($class)
    {
        return $this->userManager->supportsClass($class);
    }
}

```

## Usage

Endpoint: `/oauth/v2/token` by default

Parameters:

```
 - client_id
 - client_secret
 - facebook_access_token
```

Example

```bash
$ curl -XGET "http://youapi/oauth/v2/token?client_id=CLIENT_ID&client_secret=CLIENT_SECRET&grant_type=http%3A%2F%2Fgrants.yourapi.com%2Ffacebook_access_token&facebook_access_token=A_VALID_FACEBOOK_ACCESS_TOKEN"
{
    "access_token": "krXC75SKp--cISB_fqHA4aSsviyDVJwuutiWgaM",
    "expires_in": 604800,
    "token_type": "bearer",
    "scope": null,
    "refresh_token": "mnFs3VsGIF87x6VIazAz5ftvYw7VTfRqoBSqNCY"
}
```
