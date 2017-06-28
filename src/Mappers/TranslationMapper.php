<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Translation;

class TranslationMapper extends AbstractMapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();
        
        return $objectHydrator->hydrate(new Translation(), $this->response['translation']);
    }
}
