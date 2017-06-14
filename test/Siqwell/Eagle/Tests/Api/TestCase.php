<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\ApiToken;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Tests\HttpClient\HttpClient;
use Siqwell\Eagle\HttpClient\Request;

class TestCase extends \Siqwell\Eagle\Tests\TestCase
{
    /** @var  \Siqwell\Eagle\Tests\Api\Api */
    private $api;

    /**
     * TestCase constructor.
     */
    public function __construct()
    {
        $this->api = new Api(new HttpClient(new ApiToken()), new Methods());
    }

    /**
     * Get the expected request that will deliver a response
     *
     * @param $path
     * @param  array   $parameters
     * @param  string  $method
     * @return \Siqwell\Eagle\HttpClient\Request
     */
    protected function getRequest($path, $method = 'GET', array $parameters = []) : Request
    {
        $request = new Request(
            $path,
            $method,
            $parameters
        );

        return $request;
    }

    /**
     * @param string|\Closure $mapper
     *
     * @return \Siqwell\Eagle\Tests\Api\Api
     */
    public function setMapper($mapper)
    {
        return $this->api->setMapper($mapper);
    }

    public function getResponseDataFromFile($method, $parameters = [])
    {
        $config = $this->createConfig();
        $path =  $config['base_uri'] . '/' . $method;

        foreach ($parameters as $var => $val) {
            $path = str_replace('{' . $var . '}', $val, $path);
        }

        return file_exists($path) ? @\GuzzleHttp\json_decode(file_get_contents($path), true) : false;
    }
}
