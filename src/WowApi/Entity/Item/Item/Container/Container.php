<?php
namespace WowApi\Entity\Item\Item\Container;

use WowApi\Entity\Entity;
use WowApi\Entity\EntityInterface;
use WowApi\Entity\Item\Item\ItemContainer;

class Container extends Entity implements EntityInterface
{
    /** @var array */
    protected $properties = ['id', 'availableContexts'];

    /** @var int */
    protected $id;

    /** @var array */
    protected $availableContexts = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getAvailableContexts()
    {
        return $this->availableContexts;
    }

    /**
     * @param string $context
     *
     * @return ItemContainer
     *
     * @throws \Exception
     */
    public function getItem($context)
    {
        if (!in_array($context, $this->getAvailableContexts())) {
            throw new \Exception(sprintf(
                'Unknow context %s for item id %n',
                $context,
                $this->getId()
            ));
        }

        return $this->responseHandler->handleRequest(
            sprintf(
                'item/%s/%s',
                $this->getId(),
                $context
            ),
            new ItemContainer()
        );
    }
}
