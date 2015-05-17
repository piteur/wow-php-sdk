<?php
namespace WowApi\Entity\Item\Item\Legacy;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;
use WowApi\Entity\Item\Item\Legacy\WeaponInfo\WeaponInfo;

class Item extends Entity implements EntityInterface
{
    /** @var array */
    protected $properties = [
        'id', 'disenchantingSkillRank', 'description', 'name', 'icon', 'stackable', 'itemBind',
        'buyPrice', 'itemClass', 'itemSubClass', 'containerSlots', 'inventoryType', 'equippable',
        'itemLevel', 'maxCount', 'maxDurability', 'minFactionId', 'minReputation', 'quality',
        'sellPrice', 'requiredSkill', 'requiredLevel', 'requiredSkillRank', 'baseArmor', 'hasSockets',
        'isAuctionable', 'armor', 'displayInfoId', 'nameDescription', 'nameDescriptionColor',
        'upgradable', 'heroicTooltip', 'context',
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $disenchantingSkillRank;

    /** @var string */
    protected $description;

    /** @var string */
    protected $name;

    /** @var string */
    protected $icon;

    /** @var int */
    protected $stackable;

    /** @var int */
    protected $itemBind;

    /** @var int */
    protected $buyPrice;

    /** @var int */
    protected $itemClass;

    /** @var int */
    protected $itemSubClass;

    /** @var int */
    protected $containerSlots;

    /** @var int */
    protected $inventoryType;

    /** @var bool */
    protected $equippable;

    /** @var int */
    protected $itemLevel;

    /** @var int */
    protected $maxCount;

    /** @var int */
    protected $maxDurability;

    /** @var int */
    protected $minFactionId;

    /** @var int */
    protected $minReputation;

    /** @var int */
    protected $quality;

    /** @var int */
    protected $sellPrice;

    /** @var int */
    protected $requiredSkill;

    /** @var int */
    protected $requiredLevel;

    /** @var int */
    protected $requiredSkillRank;

    /** @var int */
    protected $baseArmor;

    /** @var bool */
    protected $hasSockets;

    /** @var bool */
    protected $isAuctionable;

    /** @var int */
    protected $armor;

    /** @var int */
    protected $displayInfoId;

    /** @var string */
    protected $nameDescription;

    /** @var string */
    protected $nameDescriptionColor;

    /** @var bool */
    protected $upgradable;

    /** @var bool */
    protected $heroicTooltip;

    /** @var string */
    protected $context;

    /** @var BonusStat[] */
    protected $bonusStats = [];

    /** @var ItemSource */
    protected $itemSource;

    /** @var WeaponInfo */
    protected $weaponInfo;

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        parent::setContent($content);

        // manage bonus stats
        if (count($content->bonusStats) >= 1) {
            foreach ($content->bonusStats as $bonus) {
                $bonusStat = new BonusStat();
                $bonusStat->setContent($bonus);

                $this->bonusStats[] = $bonusStat;
            }
        }

        // manage item source
        $itemSource = new ItemSource();
        $itemSource->setContent($content->itemSource);

        $this->itemSource = $itemSource;

        // manage weapon info
        $weaponInfo = new WeaponInfo();
        $weaponInfo->setContent($content->weaponInfo);

        $this->weaponInfo = $weaponInfo;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDisenchantingSkillRank()
    {
        return $this->disenchantingSkillRank;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getStackable()
    {
        return $this->stackable;
    }

    /**
     * @return int
     */
    public function getItemBind()
    {
        return $this->itemBind;
    }

    /**
     * @return int
     */
    public function getBuyPrice()
    {
        return $this->buyPrice;
    }

    /**
     * @return int
     */
    public function getItemClass()
    {
        return $this->itemClass;
    }

    /**
     * @return int
     */
    public function getItemSubClass()
    {
        return $this->itemSubClass;
    }

    /**
     * @return int
     */
    public function getContainerSlots()
    {
        return $this->containerSlots;
    }

    /**
     * @return int
     */
    public function getInventoryType()
    {
        return $this->inventoryType;
    }

    /**
     * @return boolean
     */
    public function isEquippable()
    {
        return $this->equippable;
    }

    /**
     * @return int
     */
    public function getItemLevel()
    {
        return $this->itemLevel;
    }

    /**
     * @return int
     */
    public function getMaxCount()
    {
        return $this->maxCount;
    }

    /**
     * @return int
     */
    public function getMaxDurability()
    {
        return $this->maxDurability;
    }

    /**
     * @return int
     */
    public function getMinFactionId()
    {
        return $this->minFactionId;
    }

    /**
     * @return int
     */
    public function getMinReputation()
    {
        return $this->minReputation;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @return int
     */
    public function getSellPrice()
    {
        return $this->sellPrice;
    }

    /**
     * @return int
     */
    public function getRequiredSkill()
    {
        return $this->requiredSkill;
    }

    /**
     * @return int
     */
    public function getRequiredLevel()
    {
        return $this->requiredLevel;
    }

    /**
     * @return int
     */
    public function getRequiredSkillRank()
    {
        return $this->requiredSkillRank;
    }

    /**
     * @return int
     */
    public function getBaseArmor()
    {
        return $this->baseArmor;
    }

    /**
     * @return boolean
     */
    public function isHasSockets()
    {
        return $this->hasSockets;
    }

    /**
     * @return boolean
     */
    public function isIsAuctionable()
    {
        return $this->isAuctionable;
    }

    /**
     * @return int
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @return int
     */
    public function getDisplayInfoId()
    {
        return $this->displayInfoId;
    }

    /**
     * @return string
     */
    public function getNameDescription()
    {
        return $this->nameDescription;
    }

    /**
     * @return string
     */
    public function getNameDescriptionColor()
    {
        return $this->nameDescriptionColor;
    }

    /**
     * @return boolean
     */
    public function isUpgradable()
    {
        return $this->upgradable;
    }

    /**
     * @return boolean
     */
    public function isHeroicTooltip()
    {
        return $this->heroicTooltip;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }
}
