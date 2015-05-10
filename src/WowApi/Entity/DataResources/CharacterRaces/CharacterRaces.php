<?php
namespace WowApi\Entity\DataResources\CharacterRaces;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class CharacterRaces extends Entity implements EntityInterface
{
    /** @var array */
    private $characterRaces = array();

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
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
