<?php

namespace Siqwell\Eagle\HttpClient;

/**
 * Class Response
 * @package Siqwell\Eagle\HttpClient
 */
class Response
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var integer
     */
    private $code;

    /**
     * @var array
     */
    private $headers;

    /**
     * Construct an response object
     *
     * @param int   $code
     * @param null  $body
     * @param array $headers
     */
    public function __construct($code = 200, $body = null, array $headers = null)
    {
        $this->code    = $code;
        $this->body    = $body;
        $this->headers = $headers;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param  int $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param  string $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param  array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }
}
