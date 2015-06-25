<?php
namespace WowApi\Entity\DataResources\CharacterAchievements;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class AchievementContainer extends Entity implements EntityInterface
{
    /** @var Achievements[] Will contain the full list of the achievements, without dealing with categories */
    protected $achievementList = array();

    /** @var Achievements[] */
    protected $achievements = array();

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        foreach ($content->achievements as $achievementList) {
            $achievements = new Achievements();
            $achievements->setContent($achievementList, $this->achievementList);

            $this->achievements[] = $achievements;
        }
    }

    /**
     * @return Achievements[]
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * @param int $achievementId
     *
     * @return null|Achievement
     */
    public function getAchievement($achievementId)
    {
        if ($this->hasAchievement($achievementId)) {
            return $this->achievementList[$achievementId];
        }

        return null;
    }

    /**
     * @param int $achievementId
     *
     * @return bool
     */
    public function hasAchievement($achievementId)
    {
        return array_key_exists($achievementId, $this->achievementList);
    }
}
