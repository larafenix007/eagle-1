<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Filter;
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
        $objectHydrator = new ObjectHydrator();

        /** @var Filter $filter */
        $filter = $objectHydrator->hydrate(new Filter(), $this->response);

        foreach ($filter->records as $i => $record) {
            /** @var Record $record */
            $filter->records[$i] = $objectHydrator->hydrate(new Record(), $record);
        }

        return $filter;
    }
}
