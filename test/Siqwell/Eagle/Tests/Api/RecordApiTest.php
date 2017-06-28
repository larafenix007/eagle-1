<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\RecordApi;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Models\Record;

class RecordApiTest extends TestCase
{
    const RECORD_ID = 777777;
    const RECORD_NOT_EXIST_ID = 'not_exist';
    const STATISTIC_DATE_FROM = '01.01.2017';
    const STATISTIC_DATE_TO = '01.01.2018';

    /** @var  RecordApi */
    private $recordApi;

    protected function setUp()
    {
        parent::setUp();
        
        $this->recordApi = new RecordApi($this->createRealHttpClient());
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

        $this->assertInstanceOf(Record::class, $record);
        $this->assertEquals($data['record'], (array)$record);
    }

    public function testFind_NotExists()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->recordApi->find(self::RECORD_NOT_EXIST_ID);
    }

    public function testStatistics()
    {
        $statistics = $this->recordApi->statistics(self::RECORD_ID, [
            'date_from' => self::STATISTIC_DATE_FROM,
            'date_to' => self::STATISTIC_DATE_TO
        ]);

        $data = $this->getResponseDataFromFile(
            Methods::RECORD_GET_STATISTICS['path'], ['id' => self::RECORD_ID]);

        $this->assertEquals($data['statistics'], (array)$statistics);
    }

    public function testAllStatistics()
    {
        $statistics = $this->recordApi->allStatistics([
            'date_from' => self::STATISTIC_DATE_FROM,
            'date_to' => self::STATISTIC_DATE_TO
        ]);

        $data = $this->getResponseDataFromFile(Methods::RECORDS_GET_STATISTICS['path'], ['id' => self::RECORD_ID]);

        $this->assertEquals($data['statistics'], (array)$statistics);
    }
    
    public function testPermalinkUrl()
    {
        $statistics = $this->recordApi->permalinkUrl(self::RECORD_ID);
    
        $data = $this->getResponseDataFromFile(Methods::RECORD_PERMA_LINK['path'], ['id' => self::RECORD_ID]);

        foreach ($statistics as $i => $statistic) {
            $this->assertEquals(
                $this->getUrlWithoutQuery($statistic),
                $this->getUrlWithoutQuery($data[$i])
            );
        }
    }
}
