<?php

namespace Siqwell\Eagle\Mappers;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
abstract class Mapper
{
    protected $response;

    /**
     * Mapper constructor.
     * @param      $content
     * @param null $url
     * @param null $base_href
     * @throws \InvalidArgumentException
     */
    public function __construct($content, $url = null, $base_href = null)
    {
        if (! $response = @\GuzzleHttp\json_decode($content, true)) {
            throw new \InvalidArgumentException('json_decode error: ' . json_last_error_msg());
        }

        $this->response = $response;
    }
    
    /**
     * @return mixed
     */
    abstract public function get();
}
