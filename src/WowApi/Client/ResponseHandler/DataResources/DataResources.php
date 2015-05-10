<?php
namespace WowApi\Client\ResponseHandler\DataResources;

use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\DataResources\Battlegroups\Battlegroups;
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
}
