<?php

namespace LaraFenix007\Eagle\Mappers;

class StatisticsMapper extends AbstractMapper
{
    public function get()
    {
        return $this->response['statistics'];
    }
}
