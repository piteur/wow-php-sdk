<?php
namespace WowApi\Client\DataResources;

use WowApi\Client\ResponseHandlerAbstract;
use WowApi\RequestMapping\DataResources\Battlegroups\Battlegroups;
use WowApi\RequestMapping\DataResources\CharacterRaces\CharacterRaces;

class DataResources extends ResponseHandlerAbstract
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
