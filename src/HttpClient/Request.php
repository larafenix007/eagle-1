<?php

namespace Siqwell\Eagle\HttpClient;

class Request
{
    const METHODS = [
        'GET',
        'HEAD',
        'PUT',
        'POST',
        'PATCH',
        'DELETE'
    ];
    
    /**
     * @var string
     */
    private $path;
    
    /**
     * @var string
     */
    private $method;
    
    /**
     * @var array
     */
    private $parameters;
    
    /**
     * Request constructor.
     * @param string $path
     * @param string $method
     * @param array  $parameters
     * @throws \InvalidArgumentException
     */
    public function __construct($path = '/', $method = 'GET', array $parameters = [])
    {
        if (!in_array($method, self::METHODS)) {
            throw new \InvalidArgumentException("Unsupproted method '$method'");
        }
        
        $this->path = $path;
        $this->method = $method;
        $this->parameters = $parameters;
        
        $this->replaceVariables();
    }
    
    /**
     * Replace $params in url like {id} to it's value
     */
    public function replaceVariables() : void
    {
        foreach ($this->parameters as $var => $val) {
            $this->setPath(str_replace("{$var}", $val, $this->getPath()));
        }
    }
    
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
    
    /**
     * @param string $path
     */
    public function setPath(string $path) : void
    {
        $this->path = $path;
    }
    
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
    
    /**
     * @param string $method
     */
    public function setMethod(string $method) : void
    {
        $this->method = $method;
    }
    
    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
    
    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters) : void
    {
        $this->parameters = $parameters;
    }
}
