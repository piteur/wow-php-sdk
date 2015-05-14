<?php
require_once __DIR__.'/../vendor/autoload.php';

try {
    $config = new \WowApi\Config\Config('eu', 'fr_FR');
} catch (\WowApi\Exception\UnknownOptionException $e) {
    die($e->getMessage());
}

var_dump($config->getAvailableLanguages());

$client = new WowApi\Client\Client($config);

$entity = $client->getDataResources()->getCharacterAchievements();

if ($entity->hasError()) {
    die($entity->getError());
}


var_dump($entity->getAchievement(4896));
