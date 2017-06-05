<?php

namespace Siqwell\Eagle\Tests\HttpClient;

use Kevinrob\GuzzleCache\CacheMiddleware;

class HttpClient extends \Siqwell\Eagle\HttpClient\HttpClient
{
    public function cacheMiddleware($ttl = 86400): CacheMiddleware
    {
        return new CacheMiddleware();
    }
}
