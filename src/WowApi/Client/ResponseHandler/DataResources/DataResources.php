<?php
namespace WowApi\Client\ResponseHandler\DataResources;

use WowApi\Client\ResponseHandler\DataResources\Character\Character;
use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\DataResources\Battlegroups\Battlegroups;

class DataResources extends ResponseHandler
{
    /**
     * @return Character
     */
    public function getCharacter()
    {
        return new Character($this->config);
    }

    /**
     * @return Battlegroups
     */
    public function getBattlegroups()
    {
        return $this->handleRequest('data/battlegroups/', new Battlegroups());
    }
}
