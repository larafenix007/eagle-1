<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Statistic;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class StatisticsMapper extends Mapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();

        return $objectHydrator->hydrate(new Statistics(), $this->response);
    }
}
