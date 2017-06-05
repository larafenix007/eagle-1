<?php

namespace Siqwell\Eagle\Tests\Api;

use Siqwell\Eagle\Api\AbstractApi;
use Siqwell\Eagle\HttpClient\Request;

class Api extends AbstractApi
{
    public function getPattern(array $variables = [], $pattern = null)
    {
        return parent::getPattern($variables, $pattern);
    }

    public function checkContent(string $content)
    {
        return parent::checkContent($content);
    }

    public function get(Request $request)
    {
        return parent::get($request);
    }
}
