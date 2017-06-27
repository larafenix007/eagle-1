<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Mappers\RecordMapper;

class AbstractApiTest extends TestCase
{
    const MAPPERCLASS = RecordMapper::class;

    public function testSetMapper_ByClass()
    {
        $api = $this->setMapper(self::MAPPERCLASS);

        $this->assertEquals(RecordMapper::class, $api->getMapper());
    }

    public function testSetMapper_ByClosure()
    {
        $closure = function () {
            return 'test';
        };

        $api = $this->setMapper($closure);

        $this->assertEquals($closure, $api->getMapper());
    }
}
