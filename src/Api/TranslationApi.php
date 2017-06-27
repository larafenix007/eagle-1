<?php

namespace Siqwell\Eagle\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\TranslationMapper;
use Siqwell\Eagle\Mappers\TranslationsMapper;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Models\Translation;

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
     * @return \Siqwell\Eagle\Models\Translation
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
