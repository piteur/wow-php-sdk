<?php
namespace WowApi\Client\DataResources;

use WowApi\Client\ResourceAbstract;
use WowApi\RequestMapping\DataResources\Battlegroups\Battlegroups;

class DataResources extends ResourceAbstract
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
