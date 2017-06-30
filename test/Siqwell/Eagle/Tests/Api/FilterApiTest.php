<?php

namespace LaraFenix007\Eagle\Tests\Api;

use LaraFenix007\Eagle\Api\FilterApi;
use LaraFenix007\Eagle\Methods;
use LaraFenix007\Eagle\Models\FilterRecord;
use LaraFenix007\Eagle\Models\Record;

class FilterApiTest extends TestCase
{
    const FILTER_ID = 44509;

    /** @var  FilterApi */
    private $filterApi;

    protected function setUp()
    {
        parent::setUp();

        $this->filterApi = new FilterApi($this->createRealHttpClient());
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

        $filter->records = array_map(function (FilterRecord $record) {
            $this->assertInstanceOf(FilterRecord::class, $record);

            return (array)$record;
        }, $filter->records);

        $this->assertEquals($data, (array)$filter);
    }
}
