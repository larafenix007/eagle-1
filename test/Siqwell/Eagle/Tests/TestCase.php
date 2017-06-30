<?php

namespace LaraFenix007\Eagle\Tests;

use Orchestra\Database\ConsoleServiceProvider;
use LaraFenix007\Eagle\ApiToken;
use LaraFenix007\Eagle\Tests\HttpClient\HttpClient;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ConsoleServiceProvider::class
        ];
    }

    public function createFakeHttpClient() : HttpClient
    {
        return new HttpClient($this->createApiToken(), $this->createFakeConfig());
    }

    public function createRealHttpClient() : \LaraFenix007\Eagle\HttpClient\HttpClient
    {
        return new \LaraFenix007\Eagle\HttpClient\HttpClient($this->createApiToken(true), $this->createRealConfig());
    }

    protected function createApiToken($isReal = false) : ApiToken
    {
        $config = $isReal ? $this->createRealConfig() : $this->createFakeConfig();

        return new ApiToken($config['api_key']);
    }

    protected function createFakeConfig() : array
    {
        return [
            'api_key' => '',
            'base_uri' => __DIR__ . '/Resources'
        ];
    }

    protected function createRealConfig()
    {
        //TODO: fix no load config
        return include __DIR__ . '/../../../../src/config/eagle.php';
    }
}
