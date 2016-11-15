<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

interface ExceptionTitleGenerator
{
    /**
     * @return string
     **/
    public function getTitle(\Exception $e);
}