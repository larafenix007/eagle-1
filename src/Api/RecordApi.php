<?php

namespace Siqwell\Eagle\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\RecordMapper;

class RecordApi extends AbstractApi
{
    public function find($id)
    {
        $parameters = array_merge([
            'id' => $id
        ]);
        
        $result = $this->setMapper(RecordMapper::class)->get(
            new Request(
                self::$methods::RECORD_GET_INFO['method'],
                self::$methods::RECORD_GET_INFO['path'],
                $parameters
            )
        );
        
        return $result;
    }
}
