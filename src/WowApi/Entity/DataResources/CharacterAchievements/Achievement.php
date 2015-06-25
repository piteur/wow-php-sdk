<?php
namespace WowApi\Entity\DataResources\CharacterAchievements;

use WowApi\Entity\DataResources\CharacterAchievements\Criterias\AchievementCriteria;
use WowApi\Entity\DataResources\CharacterAchievements\Items\AchievementItem;
use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class Achievement extends Entity implements EntityInterface
{
    protected $properties = [
        'id', 'title', 'points', 'description', 'icon',
        'accountWide', 'factionId',
    ];

    /** @var int */
    protected $id = 0;

    /** @var string */
    protected $title = '';

    /** @var int */
    protected $points = 0;

    /** @var string */
    protected $description = '';

    /** @var array */
    protected $rewardItems = array();

    /** @var string */
    protected $icon = '';

    /** @var array */
    protected $criteria = array();

    /** @var bool */
    protected $accountWide = false;

    /** @var int */
    protected $factionId = 0;

    /**
     * Populate the parent list to have access to have the achievements without dealing with
     * categories or other things
     *
     * @param \stdClass $entity
     * @param array     $achievementList
     */
    public function setContent(\stdClass $entity, array &$achievementList = [])
    {
        parent::setContent($entity);

        // populate the items
        if (count($entity->rewardItems) >= 1) {
            foreach ($entity->rewardItems as $item) {
                $achievementItem = new AchievementItem();
                $achievementItem->setContent($item);

                $this->rewardItems[] = $achievementItem;
            }
        }

        // populate the criteria
        if (count($entity->criteria) >= 1) {
            foreach ($entity->criteria as $criteria) {
                $achievementCriteria = new AchievementCriteria();
                $achievementCriteria->setContent($criteria);

                $this->criteria[] = $achievementCriteria;
            }
        }

        $achievementList[$this->getId()] = $this;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getRewardItems()
    {
        return $this->rewardItems;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * @return boolean
     */
    public function isAccountWide()
    {
        return $this->accountWide;
    }

    /**
     * @return int
     */
    public function getFactionId()
    {
        return $this->factionId;
    }
}
