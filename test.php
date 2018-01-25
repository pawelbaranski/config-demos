<?php

require_once __DIR__ . '/vendor/autoload.php';

/** load either sf or zend merge config logic */
require_once __DIR__ . '/' . $argv[1] . '/mergeConfigs.php';

$config = require_once __DIR__ . '/config/config.php';


var_dump($config);