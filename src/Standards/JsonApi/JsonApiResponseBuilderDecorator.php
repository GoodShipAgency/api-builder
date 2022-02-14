<?php

namespace Mashbo\Components\ApiBuilder\Standards\JsonApi;

use Http\Message\ResponseFactory;
use Mashbo\Components\ApiBuilder\Responses\ResponseBuilder;
use Psr\Http\Message\ResponseInterface;
use WoohooLabs\Yin\JsonApi\JsonApi;
use WoohooLabs\Yin\JsonApi\Schema\Document\AbstractResourceDocument;
use WoohooLabs\Yin\JsonApi\Schema\Document\ErrorDocument;

class JsonApiResponseBuilderDecorator implements ResponseBuilder
{
    /**
     * @var JsonApi
     */
    private $jsonApi;

    /**
     * @var AbstractResourceDocument[]
     */
    private $documents = [];
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    public function __construct(JsonApi $jsonApi, ResponseFactory $responseFactory)
    {
        $this->jsonApi = $jsonApi;
        $this->responseFactory = $responseFactory;
    }

    public function registerDocument($class, AbstractResourceDocument $document)
    {
        $this->documents[$class] = $document;
    }

    /**
     * Build a response object with the requested contents
     * @param $statusCode   int     Status code the response should have
     * @param $data         mixed   The data to be encoded in the response
     * @return ResponseInterface
     */
    public function buildResponse($statusCode, $data) : ResponseInterface
    {
        // In testing environments, as JsonApi depends on Request/Response rather than
        // request-stack the Response (and its underlying stream) is reused because the
        // kernel container reused. 
        $this->jsonApi->setResponse($this->responseFactory->createResponse());

        if ($statusCode === 204) {
            return $this->jsonApi->respond()->noContent();
        }

        if (!is_object($data)) {
            throw new \LogicException("DTOs to be rendered as JSON API documents must be classes");
        }

        if ($data instanceof ErrorDocument) {
            return $this->responseFactory->createResponse();
        }

        $class = get_class($data);

        if (!array_key_exists($class, $this->documents)) {
            throw new \LogicException("No JSON API document registered to render $class");
        }

        $document = $this->documents[$class];
        
        return $this->jsonApi->respond()->ok($document, $data)->withStatus($statusCode);

    }
}