<?php
namespace WowApi\Client;

use WowApi\Client\DataResources\DataResources;

class Client extends ClientAbstract
{
    /**
     * @return DataResources
     */
    public function getDataResources()
    {
        return new DataResources($this->config);
    }
}
