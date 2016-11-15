<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiProblemFactory
{
    /**
     * @var ExceptionTypeGenerator
     */
    private $typeGenerator;
    /**
     * @var ExceptionTitleGenerator
     */
    private $titleGenerator;
    /**
     * @var ExceptionCodeGenerator
     */
    private $codeGenerator;

    public function __construct(ExceptionTypeGenerator $typeGenerator, ExceptionTitleGenerator $titleGenerator, ExceptionCodeGenerator $codeGenerator)
    {
        $this->typeGenerator = $typeGenerator;
        $this->titleGenerator = $titleGenerator;
        $this->codeGenerator = $codeGenerator;
    }
    
    public function createFromException(\Exception $exception) : ApiProblem
    {
        return new ApiProblem(
            $this->typeGenerator->getType($exception),
            $this->titleGenerator->getTitle($exception),
            $this->codeGenerator->getCode($exception)
        );
    }
}