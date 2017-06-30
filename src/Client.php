<?php

namespace Siqwell\Eagle;

use Siqwell\Eagle\Api\AlbumApi;
use Siqwell\Eagle\Api\RecordApi;
use Siqwell\Eagle\Api\TranslationApi;
use Siqwell\Eagle\HttpClient\HttpClient;
use Siqwell\Eagle\Api\FilterApi;

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
     * @return AlbumApi
     */
    public function Album() : AlbumApi
    {
        return new AlbumApi($this->client, new Methods());
    }

    /**
     * @return FilterApi
     */
    public function Filter() : FilterApi
    {
        return new FilterApi($this->client, new Methods());
    }

    /**
     * @return RecordApi
     */
    public function Record() : RecordApi
    {
        return new RecordApi($this->client, new Methods());
    }

    /**
     * @return TranslationApi
     */
    public function Translation() : TranslationApi
    {
        return new TranslationApi($this->client, new Methods());
    }
}
