<?php

namespace Siqwell\Eagle\Tests;

use Siqwell\Eagle\ApiToken;
use Siqwell\Eagle\Tests\HttpClient\HttpClient;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function createHttpClient() : HttpClient
    {
        return new HttpClient($this->createApiToken(), $this->createConfig());
    }

    protected function createApiToken() : ApiToken
    {
        $config = $this->createConfig();

        return new ApiToken($config['api_key']);
    }

    protected function createConfig() : array
    {
        return [
            'api_key' => '',
            'base_uri' => __DIR__ . '/Resources'
        ];
    }
}
