<?php

namespace LaraFenix007\Eagle\Api;

use LaraFenix007\Eagle\HttpClient\Request;
use LaraFenix007\Eagle\Mappers\TranslationMapper;
use LaraFenix007\Eagle\Mappers\TranslationsMapper;
use LaraFenix007\Eagle\Methods;
use LaraFenix007\Eagle\Models\Translation;

class TranslationApi extends AbstractApi
{
    /**
     * @param array $options
     * @throws \Exception
     *
     * @return array
     * as_tree – если установлено true, то список будет древовидным
     */
    public function list(array $options = []) : array
    {
        $result = $this->setMapper(TranslationsMapper::class)->get(
            new Request(
                Methods::TRANSLATIONS_GET_LIST['method'],
                Methods::TRANSLATIONS_GET_LIST['path'],
                $options
            )
        );
        
        return $result;
    }
    
    /**
     * @param $id
     * @throws \Exception
     *
     * @return \LaraFenix007\Eagle\Models\Translation
     */
    public function find($id) : ?Translation
    {
        $parameters = [
            'id' => $id
        ];
        
        $result = $this->setMapper(TranslationMapper::class)->get(
            new Request(
                Methods::TRANSLATION_GET_INFO['method'],
                Methods::TRANSLATION_GET_INFO['path'],
                $parameters
            )
        );
    
        return $result;
    }
}
