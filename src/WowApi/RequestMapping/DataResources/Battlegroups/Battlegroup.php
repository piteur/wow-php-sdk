<?php
namespace WowApi\RequestMapping\DataResources\Battlegroups;

use WowApi\RequestMapping\RequestMappingAbstract;
use WowApi\RequestMapping\RequestMappingInterface;

class Battlegroup extends RequestMappingAbstract implements RequestMappingInterface
{
    /** @var array */
    protected $properties = ['name', 'slug'];

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /**
     * @param \stdClass $battlegroup
     */
    public function setContent(\stdClass $battlegroup)
    {
        if (!$this->validateInput($battlegroup)) {
            $this->name = $battlegroup->name;
            $this->slug = $battlegroup->slug;
        }
    }

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
