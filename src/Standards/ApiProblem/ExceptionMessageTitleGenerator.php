<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

class ExceptionMessageTitleGenerator implements ExceptionTitleGenerator
{
    /**
     * @return string
     **/
    public function getTitle(\Exception $e)
    {
        return $e->getMessage();
    }
}