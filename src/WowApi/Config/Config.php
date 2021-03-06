<?php
namespace WowApi\Config;

use WowApi\Exception\UnknownOptionException;

class Config
{
    /** @var string current region name */
    private $region = '';

    /** @var string current language */
    private $language = '';

    /** @var string api key */
    private $apiKey = '';

    /** Available regions */
    const US     = 'us';
    const EUROPE = 'eu';
    const KOREA  = 'kr';
    const TAIWAN = 'tw';
    const CHINA  = 'cn';

    /** @var array Corresponding languages settings */
    private $languagesMapping = [
        self::US     => ['en_US', 'es_MX', 'pt_BR'],
        self::EUROPE => ['en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'],
        self::KOREA  => ['ko_KR'],
        self::TAIWAN => ['zh_TW'],
        self::CHINA  => ['zh_CN'],
    ];

    /** @var array Mapping of the host according to the region */
    private $hostMapping = [
        self::US     => 'us.api.battle.net',
        self::EUROPE => 'eu.api.battle.net',
        self::KOREA  => 'kr.api.battle.net',
        self::TAIWAN => 'tw.api.battle.net',
        self::CHINA  => 'sea.api.battle.net',
    ];

    /**
     * Construct the config
     * Region is mandatory
     * Language is set by default, can be specified
     *
     * @param string $region
     * @param string $language
     *
     * @throws UnknownOptionException
     */
    public function __construct($region, $language = null)
    {
        $this->setRegion($region);

        $this->setLanguage($this->getDefaultLanguage());

        if ($language !== null) {
            $this->setLanguage($language);
        }
    }

    /**
     * @return array
     */
    public function getAvailableLanguages()
    {
        return $this->languagesMapping[$this->region];
    }

    /**
     * Get the default language from the current configuration
     *
     * @return string
     */
    public function getDefaultLanguage()
    {
        return $this->languagesMapping[$this->region][0];
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get partial url for api call
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return sprintf(
            'https://%s/wow/%%s?locale=%s&apikey=%s',
            $this->hostMapping[$this->region],
            $this->getLanguage(),
            $this->apiKey
        );
    }

    /**
     * @param string $region
     *
     * @return $this
     *
     * @throws UnknownOptionException
     */
    public function setRegion($region)
    {
        if (!array_key_exists($region, $this->languagesMapping)) {
            throw new UnknownOptionException(sprintf('Unsupported region %s', $region));
        }

        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $language
     *
     * @return $this
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

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
