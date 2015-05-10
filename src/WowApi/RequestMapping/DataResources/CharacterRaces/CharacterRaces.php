<?php
namespace WowApi\RequestMapping\DataResources\CharacterRaces;

use WowApi\RequestMapping\MappingEntityInterface;
use WowApi\RequestMapping\RequestMappingAbstract;

class CharacterRaces extends RequestMappingAbstract implements MappingEntityInterface
{
    /** @var array */
    private $characterRaces = array();

    /**
     * @param \stdClass $content
     */
    public function setContent($content)
    {
        foreach ($content->races as $characterRaces) {
            /** @var \stdClass $characterRaces */
            $characterRace = new CharacterRace();
            $characterRace->setContent($characterRaces);

            $this->characterRaces[] = $characterRace;
        }
    }

    /**
     * @return array
     */
    public function getCharacterRaces()
    {
        return $this->characterRaces;
    }
}
