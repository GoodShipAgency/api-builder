<?php

namespace Mashbo\Components\ApiBuilder\Standards\ApiProblem;

class ApiProblem
{
    private $type;
    private $title;
    private $status;

    public function __construct($type, $title, $status)
    {
        $this->type = $type;
        $this->title = $title;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}