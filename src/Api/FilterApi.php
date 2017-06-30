<?php

namespace LaraFenix007\Eagle\Api;

use LaraFenix007\Eagle\HttpClient\Request;
use LaraFenix007\Eagle\Mappers\FilterMapper;
use LaraFenix007\Eagle\Methods;

class FilterApi extends AbstractApi
{
    /**
     * @param $id - Идентификатор фильтра (ID) – как элемент URL запроса
     * @param array $parameters
     *
     * @return mixed
     *
     * page – страница
     * pagelimit – количество записей на странице
     * Параметры фильтра, если имеются. Указаны на странице экспорта фильтра
     * order – сортировка
     */
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
