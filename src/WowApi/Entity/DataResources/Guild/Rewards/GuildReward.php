<?php
namespace WowApi\Entity\DataResources\Guild\Rewards;

use WowApi\Entity\DataResources\CharacterAchievements\Achievement;
use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;
use WowApi\Entity\Item\Item\ItemContainer;

class GuildReward extends Entity implements EntityInterface
{
    /** @var array */
    protected $properties = ['minGuildLevel', 'minGuildRepLevel'];

    /** @var int */
    protected $minGuildLevel;

    /** @var int */
    protected $minGuildRepLevel;

    /** @var Achievement  */
    protected $achievement;

    /** @var \stdClass */
    protected $rawItem;

    /** @var ItemContainer */
    protected $item;

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        parent::setContent($content);

        if (property_exists($content, 'achievement')) {
            $achievement = new Achievement();
            $achievement->setContent($content->achievement);

            $this->achievement = $achievement;
        }

        $this->rawItem = $content->item;
    }

    /**
     * @return int
     */
    public function getMinGuildLevel()
    {
        return $this->minGuildLevel;
    }

    /**
     * @return int
     */
    public function getMinGuildRepLevel()
    {
        return $this->minGuildRepLevel;
    }

    /**
     * @return Achievement
     */
    public function getAchievement()
    {
        return $this->achievement;
    }

    /**
     * @return ItemContainer
     */
    public function getItem()
    {
        if ($this->item !== null) {
            return $this->item;
        }

        if (property_exists($this->rawItem, 'id')) {
            $request = sprintf('item/%s', $this->rawItem->id);

            if ($this->rawItem->context !== '') {
                $request .= sprintf('/%s', $this->rawItem->context);
            }

            $this->item = $this->responseHandler->handleRequest(
                $request,
                new ItemContainer()
            );
        }

        return $this->item;
    }
}