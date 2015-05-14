<?php
namespace WowApi\Entity\DataResources\CharacterAchievements;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class Achievements extends Entity implements EntityInterface
{
    protected $properties = ['id', 'name'];

    /** @var Achievement[] */
    protected $achievements = array();

    /** @var AchievementCategory[] */
    protected $categories = array();

    /** @var int */
    protected $id = 0;

    /** @var string */
    protected $name = '';

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

        // create properties (contains achievements)
        if (property_exists($content, 'categories')) {
            foreach ($content->categories as $rawCategory) {
                $category = new AchievementCategory();
                $category->setContent($rawCategory, $achievementList);

                $this->categories[] = $category;
            }
        }
    }

    /**
     * @return Achievement[]
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * @return AchievementCategory[]
     */
    public function getCategories()
    {
        return $this->categories;
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
