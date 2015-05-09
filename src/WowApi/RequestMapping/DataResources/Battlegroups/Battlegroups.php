<?php
namespace WowApi\RequestMapping\DataResources\Battlegroups;

use WowApi\RequestMapping\RequestMappingAbstract;

class Battlegroups extends RequestMappingAbstract
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

    /**
     * @param array $battlegroups
     */
    public function setBattlegroups($battlegroups)
    {
        $this->battlegroups = $battlegroups;
    }
}
