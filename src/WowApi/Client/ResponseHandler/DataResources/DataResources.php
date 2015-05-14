<?php
namespace WowApi\Client\ResponseHandler\DataResources;

use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\DataResources\Battlegroups\Battlegroups;
use WowApi\Entity\DataResources\CharacterAchievements\AchievementContainer;
use WowApi\Entity\DataResources\CharacterClasses\CharacterClasses;
use WowApi\Entity\DataResources\CharacterRaces\CharacterRaces;

class DataResources extends ResponseHandler
{
    /**
     * @return Battlegroups
     */
    public function getBattlegroups()
    {
        return $this->handleRequest('data/battlegroups/', new Battlegroups());
    }

    /**
     * @return CharacterRaces
     */
    public function getCharacterRaces()
    {
        return $this->handleRequest('data/character/races', new CharacterRaces());
    }

    /**
     * @return CharacterClasses
     */
    public function getCharacterClasses()
    {
        return $this->handleRequest('data/character/classes', new CharacterClasses());
    }

    /**
     * @return AchievementContainer
     */
    public function getCharacterAchievements()
    {
        return $this->handleRequest('data/character/achievements', new AchievementContainer());
    }
}
