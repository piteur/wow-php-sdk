<?php
namespace WowApi\Entity\Item\Item\Legacy\WeaponInfo;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class Damage extends Entity implements EntityInterface
{
    protected $properties = ['exactMax', 'exactMin', 'max', 'min'];

    /** @var float */
    protected $exactMax;

    /** @var float */
    protected $exactMin;

    /** @var int */
    protected $max;

    /** @var int */
    protected $min;

    /**
     * @return float
     */
    public function getExactMax()
    {
        return $this->exactMax;
    }

    /**
     * @return float
     */
    public function getExactMin()
    {
        return $this->exactMin;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }
}
