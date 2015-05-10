<?php
namespace WowApi\RequestMapping;

interface MappingEntityInterface
{
    public function hasError();
    public function setError();
    public function getError();
}
