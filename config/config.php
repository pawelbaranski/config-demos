<?php

$defaultConfig = require_once __DIR__ . '/config_default.php';
$envConfig = require_once __DIR__ . '/config_' . getenv('ENV') . '.php';

$parameters = require_once __DIR__ . '/parameters.php';

return mergeConfigs([$defaultConfig, $envConfig], $parameters);