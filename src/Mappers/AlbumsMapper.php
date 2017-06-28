<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Album;

/**
 * Class Mapper
 * @package Siqwell\Eagle\Mappers
 */
class AlbumsMapper extends AbstractMapper
{
    public function get() : array
    {
        $result = [];
        
        $objectHydrator = new ObjectHydrator();
        foreach ($this->response['albums'] as $row) {
            /** @var Album $album */
            $album = $objectHydrator->hydrate(new Album(), $row);
            if (!$album->children) {
                unset($album->children);
            }
            $result[] = $album;
        }
        
        return $result;
    }
}
