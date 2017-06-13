<?php

namespace Siqwell\Eagle\Api;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;
use Siqwell\Eagle\HttpClient\HttpClient;
use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\Mapper;
use Siqwell\Eagle\Methods;

/**
 * Class ContractApi
 * @package Siqwell\Eagle\Api
 */
abstract class AbstractApi
{
    /**
     * @var string
     */
    protected $pattern;
    /**
     * @var HttpClient
     */
    protected $client;
    /**
     * @var string|\Closure|null
     */
    protected $mapper;
    
    /**
     * Api constructor.
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * @param string|\Closure $mapper
     *
     * @return $this
     */
    public function setMapper($mapper)
    {
        if (is_string($mapper) && class_exists($mapper)) {
            $this->mapper = $mapper;
        } else {
            $this->mapper = null;
            
            if ($mapper instanceof \Closure) {
                $this->mapper = $mapper;
            }
        }
        
        return $this;
    }
    
    /**
     * @param      $result
     * @param null $url
     *
     * @return mixed
     */
    public function callMap($result, $url = null)
    {
        if ($this->mapper instanceof \Closure) {
            return call_user_func_array($this->mapper, [$result]);
        }
        
        if (is_string($this->mapper) &&
            class_exists($this->mapper) &&
            is_subclass_of($this->mapper, Mapper::class, true)
        ) {
            /** @var Mapper $mapper */
            $mapper = new $this->mapper($result, $url, $this->client->getConfig('base_uri'));

            return $mapper->get();
        }
        
        return null;
    }
    
    /**
     * @return bool
     */
    public function isMapped(): bool
    {
        return $this->mapper !== null;
    }
    
    /**
     * @param Request $request
     * @throws \Exception
     *
     * @return mixed
     */
    protected function get(Request $request)
    {
        $url = $this->getPattern($request->getParameters(), $request->getPath());
        
        try {
            $method = $request->getMethod();
            /** @var \Psr\Http\Message\ResponseInterface $response */
            $response = $this->client->$method($url);
        } catch (ConnectException $e) {
            return false;
        }
        
        if ($response->getStatusCode() !== 200) {
            return false;
        }
        
        if (!$content = $response->getBody()->getContents()) {
            return false;
        }
        
        if (!$content = $this->checkContent($content)) {
            return false;
        }
        
        return $this->isMapped() ? $this->callMap($content, $url) : $content;
    }
    
    /**
     * @param string $content
     *
     * @return string|bool
     */
    protected function checkContent(string $content)
    {
        if (Str::contains($content, 'captchaSound')) {
            return false;
        }
        
        return $content;
    }
    
    /**
     * @param array $variables
     * @param null  $pattern
     *
     * @return mixed
     */
    protected function getPattern(array $variables = [], $pattern = null)
    {
        $pattern = $pattern ?: $this->pattern;
        if (count($variables)) {
            foreach ($variables as $key => $value) {
                $pattern = Str::replaceFirst("{$key}", $value, $pattern);
            }
        }
        /* @var Uri $uri */
        $uri = $this->client->getConfig('base_uri');
        
        return (string)$uri->withPath($pattern);
    }
    
    /**
     * @return HttpClient
     */
    protected function getClient()
    {
        return $this->client;
    }
}
