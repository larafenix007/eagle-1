<?php

namespace LaraFenix007\Eagle\Mappers;

use LaraFenix007\Eagle\Common\ObjectHydrator;
use LaraFenix007\Eagle\Models\Album;

/**
 * Class Mapper
 * @package LaraFenix007\Eagle\Mappers
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
