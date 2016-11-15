<?php

namespace Mashbo\Components\ApiBuilder\Bridge\JmsSerializer;

use JMS\Serializer\SerializerInterface;
use Mashbo\Components\ApiBuilder\Responses\ResponseBodySerializer;

class JmsSerializerResponseBodySerializer implements ResponseBodySerializer
{
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var
     */
    private $format;

    public function __construct(SerializerInterface $serializer, $format)
    {
        $this->serializer = $serializer;
        $this->format = $format;
    }

    public function serialize($data)
    {
        return $this->serializer->serialize($data, $this->format);
    }
}
