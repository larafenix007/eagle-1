<?php

namespace LaraFenix007\Eagle;

use LaraFenix007\Eagle\Api\AlbumApi;
use LaraFenix007\Eagle\Api\RecordApi;
use LaraFenix007\Eagle\Api\TranslationApi;
use LaraFenix007\Eagle\HttpClient\HttpClient;
use LaraFenix007\Eagle\Api\FilterApi;

/**
 * Class Client
 * @package LaraFenix007\Eagle
 */
class Client
{
    /**
     * @var \LaraFenix007\Eagle\HttpClient\HttpClient
     */
    protected $client;
    /**
     * @var \LaraFenix007\Eagle\ApiToken
     */
    protected $apiToken;

    /**
     * Client constructor.
     * @param \LaraFenix007\Eagle\ApiToken $apiToken
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
