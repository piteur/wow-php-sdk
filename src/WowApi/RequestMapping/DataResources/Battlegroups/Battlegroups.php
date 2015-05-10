<?php
namespace WowApi\RequestMapping\DataResources\Battlegroups;

use WowApi\RequestMapping\MappingEntityInterface;
use WowApi\RequestMapping\RequestMappingAbstract;

class Battlegroups extends RequestMappingAbstract implements MappingEntityInterface
{
    /** @var array */
    private $battlegroups = array();

    /**
     * @param \stdClass $content
     */
    public function setContent($content)
    {
        foreach ($content->battlegroups as $battlegroupContent) {
            /** @var \stdClass $battlegroupContent */
            $battlegroup = new Battlegroup();
            $battlegroup->setContent($battlegroupContent);

            $this->battlegroups[] = $battlegroup;
        }
    }

    /**
     * @return array
     */
    public function getBattlegroups()
    {
        return $this->battlegroups;
    }
}
