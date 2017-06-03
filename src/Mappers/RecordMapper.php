<?php

namespace Siqwell\Eagle\Mappers;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class RecordMapper extends Mapper
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $result;
    
    public function get()
    {
        $this->result = collect();
        
        
    }
}
