<?php

namespace Siqwell\Eagle\Mappers;

class StatisticsMapper extends AbstractMapper
{
    public function get()
    {
        return $this->response['statistics'];
    }
}
