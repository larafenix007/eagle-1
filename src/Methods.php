<?php

namespace Siqwell\Eagle;

class Methods
{
    const TRANSLATIONS_GET_LIST = ['method' => 'get', 'path' => '/streaming/translations.json'];
    const TRANSLATION_GET_INFO = ['method' => 'get', 'path' => '/streaming/translations/{id}.json'];
    const TRANSLATION_DELETE = ['method' => 'delete', 'path' => '/streaming/translations/{id}.json'];
    const TRANSLATION_UPDATE = ['method' => 'put', 'path' => '/streaming/translations/{id}.json'];
    const TRANSLATION_GET_STATISTICS = ['method' => 'get', 'path' => '/streaming/translations/{id}/statistics.json'];
    
    const RECORDS_GET_STATISTICS = ['method' => 'get', 'path' => '/media/records/statistics.json'];
    const RECORD_GET_STATISTICS = ['method' => 'get', 'path' => '/media/records/{id}/statistics.json'];
    
    const RECORD_GET_INFO = ['method' => 'get', 'path' => '/media/records/{id}.json'];
    const RECORD_UPDATE = ['method' => 'put', 'path' => '/media/records/{id}.json'];
    const RECORD_DELETE = ['method' => 'delete', 'path' => '/media/records/{id}.json'];
    const RECORD_UPLOAD_FROM_FTP = ['method' => 'post', 'path' => '/media/records.json'];
    const RECORD_UPLOAD_FROM_HTTP = ['method' => 'post', 'path' => '/media/records.json'];
    const NEW_FILE_FROM_FTP = ['method' => 'post', 'path' => '/media/records/{id}/upload.json'];
    const NEW_FILE_FROM_HTTP = ['method' => 'post', 'path' => '/media/records/{id}/upload.json'];
    
    const FILTER_GET_RECORDS = ['method' => 'get', 'path' => '/media/filters/{id}.json'];
    
    const ALBUM_GET = ['method' => 'get', 'path' => '/media/albums.json'];
    const ALBUM_CREATE = ['method' => 'post', 'path' => '/media/albums.json'];
}
