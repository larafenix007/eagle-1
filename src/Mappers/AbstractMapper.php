<?php

namespace Siqwell\Eagle\Mappers;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
abstract class AbstractMapper
{
    protected $response;
    protected $time;
    protected $version;
    protected $errors;
    protected $status;

    /**
     * Mapper constructor.
     * @param      $content
     * @param null $url
     * @param null $base_href
     * @throws \InvalidArgumentException
     */
    public function __construct($content, $url = null, $base_href = null)
    {
        if (! $response = @\json_decode($content, true)) {
            throw new \InvalidArgumentException('json_decode error: ' . json_last_error_msg());
        }

        if (! $response['data']) {
            throw new \InvalidArgumentException('Response data');
        }

        $this->response = $response['data'];
        $this->status = $response['status'] ?? 400;
        $this->errors = $response['errors'] ?? [];

        if (isset($response['version'])) {
            $this->version = $response['version'];
        }
    }
    
    /**
     * @return mixed
     */
    abstract public function get();
}
