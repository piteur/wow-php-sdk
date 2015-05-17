<?php
require_once __DIR__.'/../vendor/autoload.php';

try {
    $config = new \WowApi\Config\Config('eu', 'fr_FR');
} catch (\WowApi\Exception\UnknownOptionException $e) {
    die($e->getMessage());
}

var_dump($config->getAvailableLanguages());

$client = new WowApi\Client\Client($config);

$entity = $client->getItem()->getItem(110050); // 'dungeon-level-up-1'

if ($entity->hasError()) {
    die($entity->getError());
}

if ($entity->isItemContainer()) {
    var_dump($entity->getItemContainer());
    var_dump($entity->getItemContainer()->getItem('dungeon-level-up-1'));
}

if ($entity->isItem()) {
    var_dump($entity->getItem());
}
