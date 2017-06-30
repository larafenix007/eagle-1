<?php

namespace LaraFenix007\Eagle\Mappers;

class SimpleMapper extends AbstractMapper
{
    public function get()
    {
        return $this->response;
    }
}
