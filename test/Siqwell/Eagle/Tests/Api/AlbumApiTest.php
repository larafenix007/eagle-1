<?php

namespace LaraFenix007\Eagle\Tests\Api;

use LaraFenix007\Eagle\Api\AlbumApi;
use LaraFenix007\Eagle\Methods;
use LaraFenix007\Eagle\Models\Album;

class AlbumApiTest extends TestCase
{
    /** @var  AlbumApi */
    private $albumApi;

    protected function setUp()
    {
        parent::setUp();
        
        $this->albumApi = new AlbumApi($this->createRealHttpClient());
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
            $this->assertInstanceOf(Album::class, $album);

            return (array)$album;
        }, $albums);

        $this->assertEquals($data['albums'], $albums);
    }
}
