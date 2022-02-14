<?php

namespace Mashbo\Components\ApiBuilder;

use Mashbo\Components\ApiBuilder\Responses\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class Context
{
    /**
     * @var ResponseBuilder
     */
    private $builder;

    public function __construct(ResponseBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function ok($data)
    {
        return $this->responseWithCode($data, 200);
    }

    public function created($data)
    {
        return $this->responseWithCode($data, 201);
    }

    public function noContent()
    {
        return $this->responseWithCode(null, 204);
    }

    public function forbidden($data)
    {
        return $this->buildJsonResponse($data, 403);
    }

    public function badRequest($data)
    {
        return $this->buildJsonResponse($data, 400);
    }

    public function unauthorized($data)
    {
        return $this->buildJsonResponse($data, 401);
    }

    private function buildJsonResponse($data, $status)
    {
        return $this->builder->buildResponse($status, $data);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function responseWithCode($data, $code)
    {
        return $this->buildJsonResponse($data, $code);
    }
}