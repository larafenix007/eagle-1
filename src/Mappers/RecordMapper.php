<?php

namespace LaraFenix007\Eagle\Mappers;

use LaraFenix007\Eagle\Common\ObjectHydrator;
use LaraFenix007\Eagle\Models\Record;

/**
 * Class Mapper
 * @package LaraFenix007\Eagle\Mappers
 */
class RecordMapper extends AbstractMapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();

        return $objectHydrator->hydrate(new Record(), $this->response['record']);
    }
}
