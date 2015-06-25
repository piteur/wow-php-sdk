<?php
namespace WowApi\Client\ResponseHandler\DataResources;

use WowApi\Client\ResponseHandler\DataResources\Character\Character;
use WowApi\Client\ResponseHandler\DataResources\Guild\Guild;
use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\DataResources\Battlegroups\Battlegroups;

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
     * @return Character
     */
    public function getCharacter()
    {
        return new Character($this->config);
    }

    /**
     * @return Guild
     */
    public function getGuild()
    {
        return new Guild($this->config);
    }
}
