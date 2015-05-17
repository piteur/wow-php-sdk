<?php
namespace WowApi\Entity\Item\Item;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;
use WowApi\Entity\Item\Item\Container\Container;
use WowApi\Entity\Item\Item\Legacy\Item;

class ItemContainer extends Entity implements EntityInterface
{
    /** @var Item */
    protected $item;

    /** @var Container */
    protected $itemContainer;

    /**
     * @param \stdClass $content
     */
    public function setContent(\stdClass $content)
    {
        // we have a legacy item
        if (property_exists($content, 'name')) {
            $this->item = $this->entityFactory(
                'WowApi\Entity\Item\Item\Legacy\Item',
                $content
            );
            return;
        }

        // we have a fake item
        $this->itemContainer = $this->entityFactory(
            'WowApi\Entity\Item\Item\Container\Container',
            $content
        );
    }

    /**
     * @return bool
     */
    public function isItem()
    {
        return $this->item !== null;
    }

    /**
     * @return bool
     */
    public function isItemContainer()
    {
        return !$this->isItem();
    }

    /**
     * @return Item|null
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @return Container|null
     */
    public function getItemContainer()
    {
        return $this->itemContainer;
    }
}