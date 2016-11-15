<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

interface ExceptionCodeGenerator
{
    /** @return int **/
    public function getCode(\Exception $e);
}