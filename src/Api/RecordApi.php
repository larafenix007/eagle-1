<?php

namespace LaraFenix007\Eagle\Api;

use LaraFenix007\Eagle\HttpClient\Request;
use LaraFenix007\Eagle\Mappers\RecordMapper;
use LaraFenix007\Eagle\Mappers\SimpleMapper;
use LaraFenix007\Eagle\Mappers\StatisticsMapper;
use LaraFenix007\Eagle\Methods;
use LaraFenix007\Eagle\Models\Record;

class RecordApi extends AbstractApi
{
    /**
     * @param $id
     * @throws \Exception
     * @return \LaraFenix007\Eagle\Models\Record
     * ID – идентификатор записи
     */
    public function find($id) : ?Record
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
     * @return array
     * ID – идентификатор записи
     * date_from – дата фильтра “от”
     * date_to – дата фильтра “до”
     * uniq = true – для уникальных просмотров
     */
    public function statistics($id, array $options = []) : array
    {
        $parameters = array_merge([
                'id' => $id
            ],
            $options
        );

        $result = $this->setMapper(StatisticsMapper::class)->get(
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
     * @return array
     * date_from – дата фильтра “от”
     * date_to – дата фильтра “до”
     * uniq = true – для уникальных просмотров
     */
    public function allStatistics(array $options = []) : array
    {
        $result = $this->setMapper(StatisticsMapper::class)->get(
            new Request(
                Methods::RECORDS_GET_STATISTICS['method'],
                Methods::RECORDS_GET_STATISTICS['path'],
                $options
            )
        );

        return $result;
    }
    
    /**
     * @param       $id
     * @param array $options
     * @throws \Exception
     *
     * @return array
     * id – идентификатор записи
     * type – тип выдаваемой ссылки (поддерживается только HLS), необязательный
     * ip – IP адрес, для которого будет действительна ссылка. По умолчанию – IP адрес клиента API запроса
     */
    public function permalinkUrl($id, array $options = []) : array
    {
        $parameters = array_merge([
                'id' => $id
            ],
            $options
        );
        
        $result = $this->setMapper(SimpleMapper::class)->get(
            new Request(
                Methods::RECORD_PERMA_LINK['method'],
                Methods::RECORD_PERMA_LINK['path'],
                $parameters
            )
        );
    
        return $result;
    }
}
