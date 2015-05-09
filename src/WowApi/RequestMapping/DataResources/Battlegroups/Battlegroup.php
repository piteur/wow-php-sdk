<?php
namespace WowApi\RequestMapping\DataResources\Battlegroups;

use WowApi\RequestMapping\RequestMappingAbstract;
use WowApi\RequestMapping\RequestMappingInterface;

class Battlegroup extends RequestMappingAbstract implements RequestMappingInterface
{
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
            $this->setName($battlegroup->name);
            $this->setSlug($battlegroup->slug);
        }
    }

    /**
     * @param \StdClass $battlegroup
     *
     * @return bool
     */
    public function validateInput($battlegroup)
    {
        if (!property_exists($battlegroup, 'name')
            || !property_exists($battlegroup, 'slug')
        ) {
            $this->setError('Api response isn\'t in the expected format');
        }

        return $this->hasError();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    protected function setSlug($slug)
    {
        $this->slug = $slug;
    }
}
