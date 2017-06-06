<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\RecordApi;
use Siqwell\Eagle\ApiToken;
use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\RecordMapper;
use Siqwell\Eagle\Tests\HttpClient\HttpClient;
use Siqwell\Eagle\Tests\Methods;

class RecordApiTest extends TestCase
{
    const RECORD_ID = 'test';
    const RECORD_NOT_EXIST_ID = 'not_exist';

    public function testFind()
    {
        $recordApi = new RecordApi(new HttpClient(new ApiToken()), new Methods());

        $record = $recordApi->find(self::RECORD_ID);
        /** @var \Siqwell\Eagle\Models\Record $record */
//        $record = $this->setMapper(RecordMapper::class)->get(
//            new Request(
//                Methods::RECORD_GET_INFO['method'],
//                Methods::RECORD_GET_INFO['path'],
//                $parameters
//            )
//        );

        $this->assertFalse($record->adult);
        $this->assertCount(3, $record->genres);
    }

    public function testFind_NotExists()
    {
        $parameters = array_merge([
            'id' => self::RECORD_ID
        ]);

        /** @var \Siqwell\Eagle\Models\Record $record */
        $record = $this->setMapper(RecordMapper::class)->get(
            new Request(
                Methods::RECORD_GET_INFO['method'],
                Methods::RECORD_GET_INFO['path'],
                $parameters
            )
        );

        $this->assertFalse($record->adult);
        $this->assertCount(3, $record->genres);
    }
}
