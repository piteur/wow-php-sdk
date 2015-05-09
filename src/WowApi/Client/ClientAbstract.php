<?php
namespace WowApi\Client;

use WowApi\Config\Config;

abstract class ClientAbstract
{
    /** @var Config */
    protected $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param Config $config
     *
     * @return $this
     */
    protected function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
    }
}
