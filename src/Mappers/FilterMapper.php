<?php

namespace LaraFenix007\Eagle\Mappers;

use LaraFenix007\Eagle\Common\ObjectHydrator;
use LaraFenix007\Eagle\Models\Filter;
use LaraFenix007\Eagle\Models\FilterRecord;
use LaraFenix007\Eagle\Models\Record;

/**
 * Class Mapper
 * @package LaraFenix007\Eagle\Mappers
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
            $filter->records[$i] = $objectHydrator->hydrate(new FilterRecord(), $record);
        }

        return $filter;
    }
}
