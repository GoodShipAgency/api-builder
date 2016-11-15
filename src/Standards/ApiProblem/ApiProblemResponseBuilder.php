<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

use Mashbo\Components\ApiBuilder\Responses\ResponseBodySerializer;
use Mashbo\Components\ApiBuilder\Responses\ResponseBuilder;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class ApiProblemResponseBuilder implements ResponseBuilder
{
    /**
     * @var ResponseBodySerializer
     */
    private $bodySerializer;

    public function __construct(ResponseBodySerializer $bodySerializer)
    {
        $this->bodySerializer = $bodySerializer;
    }

    /**
     * Build a response object with the requested contents
     * @param $statusCode   int     Status code the response should have
     * @param $data         mixed   The data to be encoded in the response
     * @return ResponseInterface
     */
    public function buildResponse($statusCode, $data) : ResponseInterface
    {
        $response = new \Zend\Diactoros\Response();
        $response->getBody()->write($this->bodySerializer->serialize($data));
        $response = $response->withHeader('Content-type', 'application/problem+json');
        $response = $response->withStatus($statusCode);
        return $response;
    }
}