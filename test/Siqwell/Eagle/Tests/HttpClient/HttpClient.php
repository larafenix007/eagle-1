<?php

namespace Siqwell\Eagle\Tests\HttpClient;

use GuzzleHttp\Psr7\Response;
use Kevinrob\GuzzleCache\CacheMiddleware;
use GuzzleHttp\Exception\ConnectException;

class HttpClient extends \Siqwell\Eagle\HttpClient\HttpClient
{
    public function cacheMiddleware($ttl = 86400): CacheMiddleware
    {
        return new CacheMiddleware();
    }

    public function get($uri, array $options = [])
    {
        $baseUri = $this->getConfig('base_uri');

        $filePath = $baseUri . '/' . $uri;
        if (!file_exists($filePath)) {
            throw new ConnectException("File $filePath does not exists", new \GuzzleHttp\Psr7\Request('GET', $uri));
        }

        $content = file_get_contents($filePath);

        return new Response(200, [], $content);
    }
}
