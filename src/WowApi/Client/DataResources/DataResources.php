<?php
namespace WowApi\Client\DataResources;

use WowApi\Client\ResponseHandlerAbstract;
use WowApi\RequestMapping\DataResources\Battlegroups\Battlegroups;

class DataResources extends ResponseHandlerAbstract
{
    /**
     * @return Battlegroups
     */
    public function getBattlegroups()
    {
        $battlegroups = new Battlegroups();

        try {
            $content = json_decode($this->getObject('data/battlegroups'));
            $battlegroups->setContent($content);
        } catch (\Exception $e) {
            $battlegroups->setError($e->getMessage());
        }

        return $battlegroups;
    }
}
