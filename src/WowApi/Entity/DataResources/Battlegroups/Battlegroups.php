<?php
namespace WowApi\Entity\DataResources\Battlegroups;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class Battlegroups extends Entity implements EntityInterface
{
    /** @var array */
    private $battlegroups = array();

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
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
