<?php

namespace Siqwell\Eagle\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Cache;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\LaravelCacheStorage;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Phlib\Guzzle\ConvertCharset;
use Siqwell\Eagle\ApiToken;

/**
 * Class HttpClient
 * @package Siqwell\Eagle
 */
class HttpClient extends Client
{
    /**
     * @var string
     */
    protected $cstore = 'file';
    /**
     * @var \Siqwell\Eagle\ApiToken
     */
    protected $apiToken;
    
    /**
     * HttpClient constructor.
     *
     * @param \Siqwell\Eagle\ApiToken $apiToken
     * @param array $config
     */
    public function __construct(ApiToken $apiToken, array $config = [])
    {
        $this->apiToken = $apiToken;
        $stack = HandlerStack::create();
        
        $stack->push($this->cacheMiddleware(), 'cache');
        $stack->push($this->charsetMiddleware(), 'charset');
        
        $config = array_merge([
            'handler' => $stack,
        ], $config);
        
        parent::__construct($config);
    }
    
    /**
     * @param int $ttl
     *
     * @return CacheMiddleware
     */
    protected function cacheMiddleware($ttl = 86400): CacheMiddleware
    {
        $store = new LaravelCacheStorage(Cache::store($this->cstore));
        
        return new CacheMiddleware(new GreedyCacheStrategy($store, $ttl));
    }
    
    /**
     * @return ConvertCharset
     */
    protected function charsetMiddleware(): ConvertCharset
    {
        return new ConvertCharset();
    }
}
