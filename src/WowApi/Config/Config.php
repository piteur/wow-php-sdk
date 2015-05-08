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
    /** @var string current region name */
    private $region = '';

    /** @var string current language */
    private $language = '';

    /** Available regions */
    const US     = 'us';
    const EUROPE = 'eu';
    const KOREA  = 'kr';
    const TAIWAN = 'tw';
    const CHINA  = 'cn';

    /** @var array Corresponding languages settings */
    private $regionMapping = array(
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
     * @param string $language
     *
     * @throws UnknownOptionException
     */
    public function __construct($region = null, $language = null)
    {
        if ($region !== null) {
            $this->setRegion($region);
        }

        $this->setLanguage($this->getDefaultLanguage());

        if ($language !== null) {
            $this->setLanguage($language);
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
        $this->validateRegion($this->region);

        return $this->regionMapping[$this->region];
    }

    /**
     * Get the default language from the current configuration
     *
     * @return string
     *
     * @throws UnknownOptionException
     */
    public function getDefaultLanguage()
    {
        $this->validateRegion($this->region);

        return $this->regionMapping[$this->region][0];
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
        $this->validateRegion($this->region);

        return sprintf(
            'http://%s/',
            $this->hostMapping[$this->region]
        );
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
        $this->validateRegion($region);

        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @throws UnknownOptionException
     */
    public function setLanguage($language)
    {
        if (!in_array($language, $this->getAvailableLanguages())) {
            throw new UnknownOptionException(sprintf(
                'Unsupported language %s for region %s',
                $language,
                $this->region
            ));
        }

        $this->language = $language;
    }

    /**
     * Validate the region input
     *
     * @param string $region
     *
     * @throws UnknownOptionException
     */
    private function validateRegion($region)
    {
        if (!array_key_exists($region, $this->regionMapping)) {
            throw new UnknownOptionException(sprintf('Unsupported region %s', $region));
        }
    }
}
