<?php

namespace LaraFenix007\Eagle\Mappers;

use LaraFenix007\Eagle\Common\ObjectHydrator;
use LaraFenix007\Eagle\Models\Translation;

class TranslationsMapper extends AbstractMapper
{
    public function get() : array
    {
        $result = [];
    
        $objectHydrator = new ObjectHydrator();
        foreach ($this->response['translations'] as $row) {
            /** @var Translation $translation */
            $translation = $objectHydrator->hydrate(new Translation(), $row);
            $result[] = $translation;
        }
    
        return $result;
    }
}
