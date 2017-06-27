<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Record;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class FilterMapper extends AbstractMapper
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $result;
    
    public function get()
    {
        $result = [];

        $objectHydrator = new ObjectHydrator();
        foreach ($this->response as $row) {
            /** @var Record $record */
            $record = $objectHydrator->hydrate(new Record(), $row);
            $result[] = $record;
        }

        return $result;
    }
}
