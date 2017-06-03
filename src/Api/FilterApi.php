<?php

namespace Siqwell\Eagle\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\FilterMapper;
use Siqwell\Eagle\Methods;

class FilterApi extends AbstractApi
{
    public function find($id, array $parameters = [])
    {
        $parameters = array_merge([
            'id' => $id
        ], $parameters);
        
        $result = $this->setMapper(FilterMapper::class)->get(
            new Request(
                Methods::FILTER_GET_RECORDS['method'],
                Methods::FILTER_GET_RECORDS['path'],
                $parameters
            )
        );
        
        return $result;
    }
}
