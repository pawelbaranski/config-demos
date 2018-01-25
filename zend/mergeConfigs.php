<?php

use Zend\Config\Processor\Token;
use Zend\Config\Config;

function mergeConfigs(array $configs, array $parameters) {

	$tokenProcessor = new Token($parameters, '%', '%');

	/** convert to Zend Config */
	$zendConfigs = array_map(function ($config) {
		return new Config($config, true);
	}, $configs);

	/** merge configs */
	/** @var Config $reduced */
	$reduced = array_reduce($zendConfigs, function (Config $config = null, Config $nextConfig = null) {
		return !$config ? $nextConfig : $config->merge($nextConfig);
	});

	/** fill in parameters and convert to array */
	return $tokenProcessor->process($reduced)->toArray();
}