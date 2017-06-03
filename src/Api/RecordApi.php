<?php

namespace Siqwell\Eagle\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\RecordMapper;
use Siqwell\Eagle\Methods;

class RecordApi extends AbstractApi
{
    public function find($id)
    {
        $parameters = array_merge([
            'id' => $id
        ]);
        
        $result = $this->setMapper(RecordMapper::class)->get(
            new Request(
                Methods::RECORD_GET_INFO['method'],
                Methods::RECORD_GET_INFO['path'],
                $parameters
            )
        );
        
        return $result;
    }
}
