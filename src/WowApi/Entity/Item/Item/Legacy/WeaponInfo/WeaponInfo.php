<?php
namespace WowApi\Entity\Item\Item\Legacy\WeaponInfo;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;

class WeaponInfo extends Entity implements EntityInterface
{
    protected $properties = ['dps', 'weaponSpeed'];

    /** @var Damage */
    protected $damage;

    /** @var float */
    protected $dps;

    /** @var float */
    protected $weaponSpeed;

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        parent::setContent($content);

        $damage = new Damage();
        $damage->setContent($content->damage);

        $this->damage = $damage;
    }
}
