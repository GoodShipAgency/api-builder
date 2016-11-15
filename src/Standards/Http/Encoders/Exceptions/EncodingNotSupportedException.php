<?php

namespace Mashbo\Components\ApiBuilder\Standards\Http\Encoders\Exceptions;

class EncodingNotSupportedException extends \Exception
{
    public function __construct($encoding)
    {
        parent::__construct("Encoding $encoding not supported");
    }
}