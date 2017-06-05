<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\ApiToken;
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
        $this->api = new Api(new HttpClient(new ApiToken()));
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

    /**
     * @param Request $request
     * @throws \Exception
     *
     * @return mixed
     */
    protected function get(Request $request)
    {
        try {
            /** @var \Psr\Http\Message\ResponseInterface $response */
            $response = $this->loadByFile($request->getPath());
        } catch (\HttpInvalidParamException $e) {
            return false;
        }

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        if (!$content = $response->getBody()->getContents()) {
            return false;
        }

        if (!$content = $this->api->checkContent($content)) {
            return false;
        }

        return $this->api->isMapped() ? $this->api->callMap($content, $request->getPath()) : $content;
    }
}
