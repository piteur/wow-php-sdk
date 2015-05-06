<?php
require_once __DIR__.'/../vendor/autoload.php';

echo 'This is the default & temporary empty test file';

$config = new \WowApi\Config\Config('eu');

var_dump($config->getAvailableLanguages());
var_dump($config->getHostUrl());
