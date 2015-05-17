<?php
namespace WowApi\Entity;

use WowApi\Client\ResponseHandler\ResponseHandler;

class Entity implements EntityInterface
{
    /** @var ResponseHandler */
    protected $responseHandler;

    /** @var array */
    protected $properties = [];

    /** @var bool */
    private $error = false;

    /** @var string */
    private $errorMessage = '';

    /**
     * @param ResponseHandler $responseHandler
     */
    public function __construct(ResponseHandler $responseHandler = null)
    {
        if ($responseHandler !== null) {
            $this->responseHandler = $responseHandler;
        }
    }

    /**
     * @return boolean
     */
    public function hasError()
    {
        return $this->error;
    }

    /**
     * @param string $errorMessage
     */
    public function setError($errorMessage = '')
    {
        $this->error = true;
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->errorMessage;
    }

    /**
     * @param \stdClass $entity
     */
    public function setContent(\stdClass $entity)
    {
        foreach ($this->properties as $property) {
            $this->$property = $entity->$property;
        }
    }
}
