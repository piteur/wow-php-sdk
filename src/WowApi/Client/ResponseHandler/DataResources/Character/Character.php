<?php
namespace WowApi\Client\ResponseHandler\DataResources\Character;

use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\DataResources\CharacterAchievements\AchievementContainer;
use WowApi\Entity\DataResources\CharacterClasses\CharacterClasses;
use WowApi\Entity\DataResources\CharacterRaces\CharacterRaces;

class Character extends ResponseHandler
{
    /**
     * @return CharacterRaces
     */
    public function getRaces()
    {
        return $this->handleRequest('data/character/races', new CharacterRaces());
    }

    /**
     * @return CharacterClasses
     */
    public function getClasses()
    {
        return $this->handleRequest('data/character/classes', new CharacterClasses());
    }

    /**
     * @return AchievementContainer
     */
    public function getAchievements()
    {
        return $this->handleRequest('data/character/achievements', new AchievementContainer());
    }
}
