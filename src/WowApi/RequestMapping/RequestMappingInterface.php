<?php
namespace WowApi\RequestMapping;

interface RequestMappingInterface
{
    public function setContent(\stdClass $input);
    public function hasError();
    public function setError();
    public function getError();
}
