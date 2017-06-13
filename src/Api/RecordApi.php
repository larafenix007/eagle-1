<?php

namespace Siqwell\Eagle\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\RecordMapper;
use Siqwell\Eagle\Mappers\StatisticMapper;
use Siqwell\Eagle\Methods;

class RecordApi extends AbstractApi
{
    /**
     * @param $id
     * @throws \Exception
     * @return mixed
     * ID – идентификатор записи
     */
    public function find($id)
    {
        $parameters = [
            'id' => $id
        ];
        
        $result = $this->setMapper(RecordMapper::class)->get(
            new Request(
                Methods::RECORD_GET_INFO['method'],
                Methods::RECORD_GET_INFO['path'],
                $parameters
            )
        );
        
        return $result;
    }

    /**
     * @param $id
     * @param $options
     * @throws \Exception
     *
     * @return mixed
     * ID – идентификатор записи
     * date_from – дата фильтра “от”
     * date_to – дата фильтра “до”
     * uniq = true – для уникальных просмотров
     */
    public function statistics($id, $options)
    {
        $parameters = array_merge([
                'id' => $id
            ],
            $options
        );

        $result = $this->setMapper(StatisticMapper::class)->get(
            new Request(
                Methods::RECORD_GET_STATISTICS['method'],
                Methods::RECORD_GET_STATISTICS['path'],
                $parameters
            )
        );

        return $result;
    }

    /**
     * @param $options
     * @throws \Exception
     *
     * @return mixed
     * date_from – дата фильтра “от”
     * date_to – дата фильтра “до”
     * uniq = true – для уникальных просмотров
     */
    public function allStatistics($options)
    {
        $result = $this->setMapper(StatisticMapper::class)->get(
            new Request(
                Methods::RECORDS_GET_STATISTICS['method'],
                Methods::RECORDS_GET_STATISTICS['path'],
                $options
            )
        );

        return $result;
    }
}
