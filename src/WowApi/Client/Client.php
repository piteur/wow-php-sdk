<?php
namespace WowApi\Client;

use WowApi\Client\ResponseHandler\Item\Item;
use WowApi\Config\Config;
use WowApi\Client\ResponseHandler\DataResources\DataResources;

class Client
{
    /** @var Config */
    protected $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return DataResources
     */
    public function getDataResources()
    {
        return new DataResources($this->config);
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return new Item($this->config);
    }
}
