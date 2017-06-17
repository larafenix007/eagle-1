<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\AlbumApi;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Models\Album;

class AlbumApiTest extends TestCase
{
    /** @var  AlbumApi */
    private $albumApi;

    protected function setUp()
    {
        parent::setUp();
        
        $this->albumApi = new AlbumApi($this->createHttpClient());
    }
    
    protected function tearDown()
    {
        unset($this->albumApi);
        
        parent::tearDown();
    }
    
    public function testList()
    {
        $albums = $this->albumApi->list();

        $data = $this->getResponseDataFromFile(Methods::ALBUM_GET['path']);
        
        $albums = array_map(function (Album $album) {
            return (array)$album;
        }, $albums);

        $this->assertEquals($data, $albums);
    }
}
