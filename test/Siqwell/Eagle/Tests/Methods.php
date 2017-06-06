<?php

namespace Siqwell\Eagle\Tests;

class Methods extends \Siqwell\Eagle\Methods
{
    const TRANSLATIONS_GET_LIST = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/streaming/translations.json'];
    const TRANSLATION_GET_INFO = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/streaming/translations/{id}.json'];
    const TRANSLATION_DELETE = ['method' => 'DELETE', 'path' => __DIR__ . '/Resources/'. '/streaming/translations/{id}.json'];
    const TRANSLATION_UPDATE = ['method' => 'PUT', 'path' => __DIR__ . '/Resources/'. '/streaming/translations/{id}.json'];
    const TRANSLATION_GET_STATISTICS = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/streaming/translations/{id}/statistics.json'];
    
    const RECORDS_GET_STATISTICS = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/media/records/statistics.json'];
    const RECORD_GET_STATISTICS = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/media/records/{id}/statistics.json'];
    
    const RECORD_GET_INFO = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/media/records/{id}.json'];
    const RECORD_UPDATE = ['method' => 'PUT', 'path' => __DIR__ . '/Resources/'. '/media/records/{id}.json'];
    const RECORD_DELETE = ['method' => 'DELETE', 'path' => __DIR__ . '/Resources/'. '/media/records/{id}.json'];
    const RECORD_UPLOAD_FROM_FTP = ['method' => 'POST', 'path' => __DIR__ . '/Resources/'. '/media/records.json'];
    const RECORD_UPLOAD_FROM_HTTP = ['method' => 'POST', 'path' => __DIR__ . '/Resources/'. '/media/records.json'];
    const NEW_FILE_FROM_FTP = ['method' => 'POST', 'path' => __DIR__ . '/Resources/'. '/media/records/{id}/upload.json'];
    const NEW_FILE_FROM_HTTP = ['method' => 'POST', 'path' => __DIR__ . '/Resources/'. '/media/records/{id}/upload.json'];
    
    const FILTER_GET_RECORDS = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/media/filters/{id}.json'];
    
    const ALBUM_GET = ['method' => 'GET', 'path' => __DIR__ . '/Resources/'. '/media/albums.json'];
    const ALBUM_CREATE = ['method' => 'POST', 'path' => __DIR__ . '/Resources/'. '/media/albums.json'];
}
