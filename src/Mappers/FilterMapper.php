<?php

namespace Siqwell\Eagle\Mappers;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class FilterMapper extends Mapper
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
