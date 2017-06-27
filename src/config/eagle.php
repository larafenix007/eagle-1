<?php
return [
    /*
     * Api key
     */
    'api_key' => '--SD8N3jx7LZi-rYz5Wz',
    
    'base_uri' => 'http://api.eagleplatform.com',

    'account' => 'siqwell',
    
    /**
     * Client options
     */
    'options' => [
        /**
         * Use https
         */
        'secure' => true,
        
        /*
         * Cache
         */
        'cache' => [
            'enabled' => true,
            // Keep the path empty or remove it entirely to default to storage/eagle
            'path' => storage_path('eagle')
        ],
        
        /*
         * Log
         */
        'log' => [
            'enabled' => true,
            // Keep the path empty or remove it entirely to default to storage/logs/eagle.log
            'path' => storage_path('logs/eagle.log')
        ]
    ],
    'headers' => [
        'Referer' => 'https://www.eagle.ru/',
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language' => 'ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    ]
];
