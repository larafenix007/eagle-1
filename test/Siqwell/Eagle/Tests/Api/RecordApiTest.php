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
        $recordApi = new RecordApi($this->createHttpClient(), new Methods());

        $record = $recordApi->find(self::RECORD_ID);

        $this->assertFalse($record->adult);
        $this->assertCount(3, $record->genres);
    }

    public function testFind_NotExists()
    {
        $recordApi = new RecordApi($this->createHttpClient(), new Methods());

        $record = $recordApi->find(self::RECORD_NOT_EXIST_ID);

        $this->assertFalse($record);
    }
}
