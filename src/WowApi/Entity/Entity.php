<?php
namespace WowApi\Entity;

class Entity implements EntityInterface
{
    /** @var array */
    protected $properties = [];

    /** @var bool */
    private $error = false;

    /** @var string */
    private $errorMessage = '';

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
     * @param \stdClass $battlegroup
     */
    public function setContent(\stdClass $battlegroup)
    {
        foreach ($this->properties as $property) {
            $this->$property = $battlegroup->$property;
        }
    }
}