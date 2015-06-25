<?php
require_once __DIR__.'/../vendor/autoload.php';

try {
    $config = new \WowApi\Config\Config('eu', 'fr_FR');
    $config->setApiKey('');
} catch (\WowApi\Exception\UnknownOptionException $e) {
    die($e->getMessage());
}

$client = new WowApi\Client\Client($config);

$entity = $client->getDataResources()->getGuild()->getRewards();

if ($entity->hasError()) {
    die($entity->getError());
}

var_dump($entity->getRewards()[0]);
