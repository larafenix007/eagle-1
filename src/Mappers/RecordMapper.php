<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Record;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class RecordMapper extends AbstractMapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();

        return $objectHydrator->hydrate(new Record(), $this->response['record']);
    }
}
