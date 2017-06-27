<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\FilterApi;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Models\Record;

class FilterApiTest extends TestCase
{
    const FILTER_ID = 'test';

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
        $filters = $this->filterApi->find(self::FILTER_ID);

        $data = $this->getResponseDataFromFile(Methods::FILTER_GET_RECORDS['path'], ['id' => self::FILTER_ID]);

        $filters = array_map(function (Record $filter) {
            $this->assertInstanceOf(Record::class, $filter);

            return (array)$filter;
        }, $filters);

        $this->assertEquals($data, $filters);
    }
}
