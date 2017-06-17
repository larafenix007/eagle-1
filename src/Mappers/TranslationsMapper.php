<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Translation;

class TranslationsMapper extends AbstractMapper
{
    public function get() : array
    {
        $result = [];
    
        $objectHydrator = new ObjectHydrator();
        foreach ($this->response as $row) {
            /** @var Translation $translation */
            $translation = $objectHydrator->hydrate(new Translation(), $row);
            $result[] = $translation;
        }
    
        return $result;
    }
}
