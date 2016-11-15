<?php

namespace Mashbo\Components\ApiBuilder\Responses;

use Psr\Http\Message\ResponseInterface;

interface ResponseBuilder
{
    /**
     * Build a response object with the requested contents
     * @param $statusCode   int     Status code the response should have
     * @param $data         mixed   The data to be encoded in the response
     * @return ResponseInterface
     */
    public function buildResponse($statusCode, $data) : ResponseInterface;
}