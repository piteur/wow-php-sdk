<?php
namespace WowApi\Entity;

interface EntityInterface
{
    public function hasError();
    public function setError();
    public function getError();
    public function setContent(\stdClass $content);
}
