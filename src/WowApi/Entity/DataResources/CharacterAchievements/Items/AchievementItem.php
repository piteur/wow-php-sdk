<?php
namespace WowApi\Entity\DataResources\CharacterAchievements\Items;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class AchievementItem extends Entity implements EntityInterface
{
    protected $properties = ['id'];

    /** @var int */
    protected $id = 0;

    /** @var null */
    private $item = null;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * lazy loading method, to avoid making useless API call
     * Only do it when content is asked
     *
     * @todo manage api call to retrieve the item on demand.
     *  Need to have the item endpoint
     */
    public function getItem()
    {
        if ($this->item !== null) {
            return $this->item;
        }

        $this->item = 'lol';

        return $this->getItem();
    }
}
