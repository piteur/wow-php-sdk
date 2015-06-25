<?php
namespace WowApi\Client\ResponseHandler\DataResources\Guild;

use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\DataResources\Guild\Rewards\GuildRewards;

class Guild extends ResponseHandler
{
    /**
     * @return GuildRewards
     */
    public function getRewards()
    {
        return $this->handleRequest('data/guild/rewards', new GuildRewards());
    }
}
