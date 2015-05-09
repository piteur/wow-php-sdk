<?php
namespace WowApi\RequestMapping;

abstract class RequestMappingAbstract
{
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
     * @param \stdClass $input
     *
     * @return bool
     */
    protected function validateInput($input)
    {
        return true;
    }
}
