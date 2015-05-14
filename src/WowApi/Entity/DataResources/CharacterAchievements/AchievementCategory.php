<?php
namespace WowApi\Entity\DataResources\CharacterAchievements;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class AchievementCategory extends Entity implements EntityInterface
{
    protected $properties = ['id', 'name'];

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var array */
    protected $achievements = [];

    /**
     * @param \stdClass $content
     * @param array     $achievementList
     */
    public function setContent(\stdClass $content, array &$achievementList)
    {
        parent::setContent($content);

        foreach ($content->achievements as $rawAchievement) {
            $achievement = new Achievement();
            $achievement->setContent($rawAchievement, $achievementList);

            $this->achievements[$achievement->getId()] = $achievement;
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
