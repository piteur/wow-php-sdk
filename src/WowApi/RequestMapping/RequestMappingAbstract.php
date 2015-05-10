<?php
namespace WowApi\RequestMapping;

abstract class RequestMappingAbstract
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
     * @param \StdClass $battlegroup
     *
     * @return bool
     */
    public function validateInput($battlegroup)
    {
        foreach ($this->properties as $property)
        {
            if (!property_exists($battlegroup, $property)) {
                $this->setError(sprintf(
                    'Api response isn\'t in the expected format, missing property %s',
                    $property
                ));
                break;
            }
        }

        return $this->hasError();
    }
}
