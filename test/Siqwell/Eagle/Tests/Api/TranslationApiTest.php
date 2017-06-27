<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\TranslationApi;
use Siqwell\Eagle\Methods;
use Siqwell\Eagle\Models\Translation;

class TranslationApiTest extends TestCase
{
    const TRANSLATION_ID = 'test';
    const TRANSLATION_NOT_EXIST_ID = 'not_exist';
    
    /** @var  TranslationApi */
    private $translationApi;

    protected function setUp()
    {
        parent::setUp();
        
        $this->translationApi = new TranslationApi($this->createHttpClient());
    }
    
    protected function tearDown()
    {
        unset($this->translationApi);
        
        parent::tearDown();
    }
    
    public function testList()
    {
        $translations = $this->translationApi->list();

        $data = $this->getResponseDataFromFile(Methods::TRANSLATIONS_GET_LIST['path']);

        $translations = array_map(function (Translation $translation) {
            return (array)$translation;
        }, $translations);

        $this->assertEquals($data, $translations);
    }
    
    public function testFind()
    {
        $translation = $this->translationApi->find(self::TRANSLATION_ID);
    
        $data = $this->getResponseDataFromFile(Methods::TRANSLATION_GET_INFO['path'], ['id' => self::TRANSLATION_ID]);
    
        $this->assertInstanceOf(Translation::class, $translation);
        $this->assertEquals($data, (array)$translation);
    }

    public function testFind_NotExists()
    {
        $translation = $this->translationApi->find(self::TRANSLATION_NOT_EXIST_ID);

        $this->assertNull($translation);
    }
}
