<?php
namespace WowApi\Entity\Item\Item\Legacy;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class BonusStat extends Entity implements EntityInterface
{
    protected $properties = ['amount', 'stat'];

    /** @var int */
    protected $amount;

    /** @var int */
    protected $stat;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getStat()
    {
        return $this->stat;
    }
}
