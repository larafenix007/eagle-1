<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Statistic;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class StatisticMapper extends Mapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();

        return $objectHydrator->hydrate(new Statistic(), $this->response);
    }
}
