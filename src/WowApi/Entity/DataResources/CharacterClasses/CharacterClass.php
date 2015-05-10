<?php
namespace WowApi\Entity\DataResources\CharacterClasses;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class CharacterClass extends Entity implements EntityInterface
{
    protected $properties = ['id', 'mask', 'powerType', 'name'];

    /** @var int */
    protected $id;

    /** @var int */
    protected $mask;

    /** @var string */
    protected $powerType;

    /** @var string */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @return string
     */
    public function getPowerType()
    {
        return $this->powerType;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
