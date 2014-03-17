<?php

namespace AdrienBrault\OAuth2FacebookGrantBundle\Model;

interface FacebookGrantedUserInterface
{
    public function setFacebookAccessToken($token);

    public function getFacebookAccessToken();
}
