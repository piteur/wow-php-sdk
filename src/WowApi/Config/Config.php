<?php
namespace WowApi\Config;

use WowApi\Exception\UnknownOptionException;

/**
 * Class Config
 *
 * @package WowApi\Config
 */
class Config
{
    /** @var string current region name, set by the children */
    protected $region = '';

    /** Available regions */
    const US     = 'us';
    const EUROPE = 'eu';
    const KOREA  = 'kr';
    const TAIWAN = 'tw';
    const CHINA  = 'cn';

    /** @var array Corresponding languages settings */
    private $regions = array(
        self::US     => array('en_US', 'es_MX', 'pt_BR'),
        self::EUROPE => array('en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'),
        self::KOREA  => array('ko_KR'),
        self::TAIWAN => array('zh_TW'),
        self::CHINA  => array('zh_CN'),
    );

    /** @var array Mapping of the host according to the region */
    private $hostMapping = array(
        self::US     => 'us.battle.net',
        self::EUROPE => 'eu.battle.net',
        self::KOREA  => 'kr.battle.net',
        self::TAIWAN => 'tw.battle.net',
        self::CHINA  => 'www.battlenet.com.cn',
    );

    /**
     * Construct the config, and optional region can be set
     *
     * @param string $region
     *
     * @throws UnknownOptionException
     */
    public function __construct($region = null)
    {
        if ($region !== null) {
            $this->setRegion($region);
        }
    }

    /**
     * Get available languages list
     *
     * @return array
     *
     * @throws UnknownOptionException
     */
    public function getAvailableLanguages()
    {
        if (!array_key_exists($this->region, $this->regions)) {
            throw new UnknownOptionException(sprintf('Unsupported region %s', $this->region));
        }

        return $this->regions[$this->region];
    }

    /**
     * Get url to reach for api calls
     *
     * @return string
     *
     * @throws UnknownOptionException
     */
    public function getHostUrl()
    {
        if (!array_key_exists($this->region, $this->regions)) {
            throw new UnknownOptionException(sprintf('Unsupported region %s', $this->region));
        }

        return $this->hostMapping[$this->region];
    }

    /**
     * Set the region to use for the api call
     *
     * @param string $region
     *
     * @throws UnknownOptionException
     */
    public function setRegion($region)
    {
        if (!array_key_exists($region, $this->regions)) {
            throw new UnknownOptionException(sprintf('Unsupported region %s', $region));
        }

        $this->region = $region;
    }
}
