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

    /**
     * @param Request $request
     * @throws \Exception
     *
     * @return mixed
     */
    public function get(Request $request)
    {
        try {
            /** @var \Psr\Http\Message\ResponseInterface $response */
            $content = $this->loadByFile($request->getPath());
        } catch (\InvalidArgumentException $e) {
            return false;
        }

        return $this->isMapped() ? $this->callMap($content, $request->getPath()) : $content;
    }

    /**
     * Load an json file from the Resources directory
     *
     * @param $file
     * @throws \HttpInvalidParamException
     * @return mixed
     */
    public function loadByFile($file)
    {
        if (!file_exists(__DIR__ . '/Resources/' . $file)) {
            throw new \InvalidArgumentException('File not found in resource');
        }

        return file_get_contents(
                    sprintf(
                        '%s/%s',
                        __DIR__ . '/Resources/',
                        $file
                    )
                );
    }
}
