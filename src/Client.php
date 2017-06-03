<?php

namespace Siqwell\Eagle;

use Siqwell\Eagle\HttpClient\HttpClient;
use Siqwell\Eagle\Api\FilmApi;
use Siqwell\Eagle\Api\FilterApi;
use Siqwell\Eagle\Api\MetaApi;
use Siqwell\Eagle\Api\NameApi;
use Siqwell\Eagle\Api\SearchApi;

/**
 * Class Client
 * @package Siqwell\Eagle
 */
class Client
{
    /**
     * @var \Siqwell\Eagle\HttpClient\HttpClient
     */
    protected $client;
    /**
     * @var \Siqwell\Eagle\ApiToken
     */
    protected $apiToken;
    
    /**
     * Client constructor.
     * @param \Siqwell\Eagle\ApiToken $apiToken
     * @param array                   $options
     */
    public function __construct(ApiToken $apiToken, array $options = [])
    {
        $this->client = new HttpClient($apiToken, $options);
    }
    
    /**
     * @return FilterApi
     */
    public function Filter() : FilterApi
    {
        return new FilterApi($this->client);
    }
}
