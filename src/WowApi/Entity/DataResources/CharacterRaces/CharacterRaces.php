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
            $this->characterRaces[] = $this->entityFactory(
                'WowApi\Entity\DataResources\CharacterRaces\CharacterRace',
                $characterRaces
            );
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
