<?php
ini_set('display_errors', 1);
require_once __DIR__.'/../vendor/autoload.php';

try {
    $config = new \WowApi\Config\Config('eu', 'fr_FR');
} catch (\WowApi\Exception\UnknownOptionException $e) {
    die($e->getMessage());
}

var_dump($config->getAvailableLanguages());

$client = new WowApi\Client\Client($config);

$entity = $client->getDataResources()->getCharacterRaces();

if ($entity->hasError()) {
    die($entity->getError());
}

var_dump($entity);
