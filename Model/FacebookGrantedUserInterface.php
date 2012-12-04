<?php

namespace FSC\OAuth2FacebookGrantBundle\Model;

interface FacebookGrantedUserInterface
{
    public function setFacebookAccessToken($token);

    public function getFacebookAccessToken();
}
