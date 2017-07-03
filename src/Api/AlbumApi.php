<?php

namespace Siqwell\Eagle\Api;

use Siqwell\Eagle\HttpClient\Request;
use Siqwell\Eagle\Mappers\AlbumsMapper;
use Siqwell\Eagle\Methods;

/**
 * Class AlbumApi
 * @package Siqwell\Eagle\Api
 */
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
