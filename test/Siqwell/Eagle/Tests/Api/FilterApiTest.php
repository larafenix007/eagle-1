<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\FilterApi;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Models\Record;

class FilterApiTest extends TestCase
{
    const FILTER_ID = 44509;

    /** @var  FilterApi */
    private $filterApi;

    protected function setUp()
    {
        parent::setUp();

        $this->filterApi = new FilterApi($this->createHttpClient());
    }

    protected function tearDown()
    {
        unset($this->filterApi);

        parent::tearDown();
    }

    public function testFind()
    {
        $filter = $this->filterApi->find(self::FILTER_ID);

        $data = $this->getResponseDataFromFile(Methods::FILTER_GET_RECORDS['path'], ['id' => self::FILTER_ID]);

        $filter->records = array_map(function (Record $record) {
            $this->assertInstanceOf(Record::class, $record);

            return (array)$record;
        }, $filter->records);

        $this->assertEquals($data, (array)$filter);
    }
}
