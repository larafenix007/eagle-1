<?php

namespace LaraFenix007\Eagle\Api;

use LaraFenix007\Eagle\HttpClient\Request;
use LaraFenix007\Eagle\Mappers\AlbumsMapper;
use LaraFenix007\Eagle\Methods;

class AlbumApi extends AbstractApi
{
    /**
     * @param array $options
     * @throws \Exception
     *
     * @return array
     * as_tree – если установлено true, то список будет древовидным
     */
    public function list(array $options = []) : array
    {
        $result = $this->setMapper(AlbumsMapper::class)->get(
            new Request(
                Methods::ALBUM_GET['method'],
                Methods::ALBUM_GET['path'],
                $options
            )
        );
        
        return $result;
    }
}
