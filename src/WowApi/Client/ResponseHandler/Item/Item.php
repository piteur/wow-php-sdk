<?php
namespace WowApi\Client\ResponseHandler\Item;

use WowApi\Client\ResponseHandler\ResponseHandler;
use WowApi\Entity\Item\Item\ItemContainer;

class Item extends ResponseHandler
{
    /**
     * @param int    $itemId
     * @param string $context
     *
     * @return ItemContainer
     */
    public function getItem($itemId, $context = '')
    {
        $request = sprintf('item/%s', $itemId);

        if ($context !== '') {
            $request .= sprintf('/%s', $context);
        }

        return $this->handleRequest(
            $request,
            new ItemContainer($this)
        );
    }
}
