<?php

namespace Siqwell\Eagle\Mappers;

/**
 * Class SimpleMapper
 * @package Siqwell\Eagle\Mappers
 */
class SimpleMapper extends AbstractMapper
{
    public function get()
    {
        return $this->response;
    }
}
