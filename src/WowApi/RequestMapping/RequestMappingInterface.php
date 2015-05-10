<?php
namespace WowApi\RequestMapping;

interface RequestMappingInterface extends MappingEntityInterface
{
    public function setContent(\stdClass $input);
}
