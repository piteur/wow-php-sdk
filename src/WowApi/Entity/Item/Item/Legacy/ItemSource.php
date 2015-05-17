<?php
namespace WowApi\Entity\Item\Item\Legacy;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class ItemSource extends Entity implements EntityInterface
{
    protected $properties = ['sourceId', 'sourceType'];

    /** @var int */
    protected $sourceId;

    /** @var string */
    protected $sourceType;

    /**
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @return string
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }
}