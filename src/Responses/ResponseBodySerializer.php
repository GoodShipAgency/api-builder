<?php

namespace Mashbo\Components\ApiBuilder\Responses;

interface ResponseBodySerializer
{
    /**
     * @param $data
     * @return mixed
     */
    public function serialize($data);
}