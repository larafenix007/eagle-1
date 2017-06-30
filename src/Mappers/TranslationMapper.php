<?php

namespace LaraFenix007\Eagle\Mappers;

use LaraFenix007\Eagle\Common\ObjectHydrator;
use LaraFenix007\Eagle\Models\Translation;

class TranslationMapper extends AbstractMapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();
        
        return $objectHydrator->hydrate(new Translation(), $this->response['translation']);
    }
}
