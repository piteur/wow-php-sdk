<?php
namespace WowApi\Entity\DataResources\Battlegroups;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class Battlegroup extends Entity implements EntityInterface
{
    /** @var array */
    protected $properties = ['name', 'slug'];

    /** @var string */
    protected $name;

    /** @var string */
    protected $slug;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
