<?php
namespace WowApi\Entity\DataResources\CharacterAchievements\Criterias;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class AchievementCriteria extends Entity implements EntityInterface
{
    protected $properties = ['id', 'description', 'orderIndex', 'max'];

    /** @var int */
    protected $id = 0;

    /** @var string */
    protected $description = '';

    /** @var int */
    protected $orderIndex = 0;

    /** @var int */
    protected $max = 0;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getOrderIndex()
    {
        return $this->orderIndex;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }
}
