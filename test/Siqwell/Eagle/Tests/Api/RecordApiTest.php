<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\RecordApi;
use Siqwell\Eagle\Methods;

class RecordApiTest extends TestCase
{
    const RECORD_ID = 'test';
    const RECORD_NOT_EXIST_ID = 'not_exist';

    public function testFind()
    {
        $recordApi = new RecordApi($this->createHttpClient());

        $record = $recordApi->find(self::RECORD_ID);

        $data = $this->getResponseDataFromFile(Methods::RECORD_GET_INFO['path'], ['id' => self::RECORD_ID]);

        $this->assertEquals((array)$data, (array)$record);
    }

    public function testFind_NotExists()
    {
        $recordApi = new RecordApi($this->createHttpClient(), new Methods());

        $record = $recordApi->find(self::RECORD_NOT_EXIST_ID);

        $this->assertFalse($record);
    }
}
