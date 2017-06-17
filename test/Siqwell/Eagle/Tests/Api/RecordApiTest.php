<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\RecordApi;
use Siqwell\Eagle\Methods;

class RecordApiTest extends TestCase
{
    const RECORD_ID = 'test';
    const RECORD_NOT_EXIST_ID = 'not_exist';
    
    /** @var  RecordApi */
    private $recordApi;

    protected function setUp()
    {
        parent::setUp();
        
        $this->recordApi = new RecordApi($this->createHttpClient());
    }
    
    protected function tearDown()
    {
        unset($this->recordApi);
        
        parent::tearDown();
    }
    
    public function testFind()
    {
        $record = $this->recordApi->find(self::RECORD_ID);

        $data = $this->getResponseDataFromFile(Methods::RECORD_GET_INFO['path'], ['id' => self::RECORD_ID]);

        $this->assertEquals($data, (array)$record);
    }

    public function testFind_NotExists()
    {
        $record = $this->recordApi->find(self::RECORD_NOT_EXIST_ID);

        $this->assertFalse($record);
    }

    public function testStatistics()
    {
        $statistics = $this->recordApi->statistics(self::RECORD_ID);

        $data = $this->getResponseDataFromFile(Methods::RECORD_GET_STATISTICS['path'], ['id' => self::RECORD_ID]);

        $this->assertEquals($data, (array)$statistics);
    }

    public function testAllStatistics()
    {
        $statistics = $this->recordApi->allStatistics();

        $data = $this->getResponseDataFromFile(Methods::RECORDS_GET_STATISTICS['path'], ['id' => self::RECORD_ID]);

        $this->assertEquals($data, (array)$statistics);
    }
    
    public function testPermalinkUrl()
    {
        $statistics = $this->recordApi->permalinkUrl(self::RECORD_ID);
    
        $data = $this->getResponseDataFromFile(Methods::RECORD_PERMA_LINK['path'], ['id' => self::RECORD_ID]);
    
        $this->assertEquals($data, (array)$statistics);
    }
}
