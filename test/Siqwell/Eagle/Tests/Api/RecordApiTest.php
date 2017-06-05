<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\RecordMapper;
use Siqwell\Eagle\Methods;

class RecordApiTest extends TestCase
{
    const RECORD_ID = 120;

    public function testFind() : void
    {
        $parameters = array_merge([
            'id' => self::RECORD_ID
        ]);

        $result = $this->setMapper(RecordMapper::class)->get(
            new Request(
                Methods::RECORD_GET_INFO['method'],
                Methods::RECORD_GET_INFO['path'],
                $parameters
            )
        );

        var_dump($result); exit;
    }
}
