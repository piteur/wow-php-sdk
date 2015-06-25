<?php
namespace WowApi\Entity\DataResources\Guild\Rewards;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class GuildRewards extends Entity implements EntityInterface
{
    /** @var array */
    private $rewards = [];

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        foreach ($content->rewards as $reward) {
            $this->rewards[] = $this->entityFactory(
                'WowApi\Entity\DataResources\Guild\Rewards\GuildReward',
                $reward
            );
        }
    }

    /**
     * @return array
     */
    public function getRewards()
    {
        return $this->rewards;
    }
}
