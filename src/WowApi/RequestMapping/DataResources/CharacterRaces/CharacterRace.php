<?php
namespace WowApi\RequestMapping\DataResources\CharacterRaces;

use WowApi\RequestMapping\RequestMappingAbstract;
use WowApi\RequestMapping\RequestMappingInterface;

class CharacterRace extends RequestMappingAbstract implements RequestMappingInterface
{
    /** @var array */
    protected $properties = ['id', 'mask', 'side', 'name'];

    /** @var int */
    private $id;

    /** @var int */
    private $mask;

    /** @var string */
    private $side;

    /** @var string */
    private $name;

    /**
     * @param \stdClass $characterRace
     */
    public function setContent(\stdClass $characterRace)
    {
        if (!$this->validateInput($characterRace)) {
            $this->id =$characterRace->id;
            $this->mask = $characterRace->mask;
            $this->side = $characterRace->side;
            $this->name = $characterRace->name;
        }
    }
}
