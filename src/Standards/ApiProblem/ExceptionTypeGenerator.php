<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

interface ExceptionTypeGenerator
{
    /** @return string **/
    public function getType(\Exception $e);
}