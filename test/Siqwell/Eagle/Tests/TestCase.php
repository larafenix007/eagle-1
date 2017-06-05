<?php

namespace Siqwell\Eagle\Tests;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Load an json file from the Resources directory
     *
     * @param $file
     * @throws \HttpInvalidParamException
     * @return mixed
     */
    protected function loadByFile($file)
    {
        if (!file_exists(__DIR__ . '/Resources/' . $file)) {
            throw new \HttpInvalidParamException('File not found in resource');
        }

        return json_decode(
            file_get_contents(
                sprintf(
                    '%s/%s',
                    __DIR__ . '/Resources/',
                    $file
                )
            ),
            true
        );
    }
}
