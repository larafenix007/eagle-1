<?php

namespace Siqwell\Eagle\Tests;

use Orchestra\Database\ConsoleServiceProvider;
use Siqwell\Eagle\ApiToken;
use Siqwell\Eagle\EagleServiceProvider;
use Siqwell\Eagle\Tests\HttpClient\HttpClient;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            EagleServiceProvider::class,
            ConsoleServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'eagle' => EagleServiceProvider::class
        ];
    }

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
