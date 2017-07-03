<?php

namespace Siqwell\Eagle\Mappers;

use Siqwell\Eagle\Common\ObjectHydrator;
use Siqwell\Eagle\Models\Translation;

/**
 * Class TranslationMapper
 * @package Siqwell\Eagle\Mappers
 */
class TranslationMapper extends AbstractMapper
{
    /**
     * @return \Siqwell\Eagle\Models\AbstractModel
     */
    public function get()
    {
        $objectHydrator = new ObjectHydrator();

        return $objectHydrator->hydrate(new Translation(), $this->response['translation']);
    }
}
