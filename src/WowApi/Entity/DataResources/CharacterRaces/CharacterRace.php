<?php
namespace WowApi\Entity\DataResources\CharacterRaces;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class CharacterRace extends Entity implements EntityInterface
{
    /** @var array */
    protected $properties = ['id', 'mask', 'side', 'name'];

    /** @var int */
    protected $id;

    /** @var int */
    protected $mask;

    /** @var string */
    protected $side;

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
    public function getSide()
    {
        return $this->side;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
