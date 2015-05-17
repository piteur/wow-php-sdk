<?php
namespace WowApi\Entity\DataResources\CharacterClasses;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class CharacterClasses extends Entity implements EntityInterface
{
    /** @var array */
    private $characterClasses = [];

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        foreach ($content->classes as $characterClasses) {
            $this->characterClasses[] = $this->entityFactory(
                'WowApi\Entity\DataResources\CharacterClasses\CharacterClass',
                $characterClasses
            );
        }
    }

    /**
     * @return array
     */
    public function getCharacterClasses()
    {
        return $this->characterClasses;
    }
}
