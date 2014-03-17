<?php

namespace AdrienBrault\OAuth2FacebookGrantBundle\Tests\Functional;

class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $kernel = new TestKernel();
        $kernel->boot();
        $kernel->getContainer();
        $kernel->getContainer()->get('ab_oauth2_facebook_grant.grants.facebook');
    }
}
