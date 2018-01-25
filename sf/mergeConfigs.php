<?php

use Symfony\Component\OptionsResolver\OptionsResolver;

function mergeConfigs(array $configs, array $parameters) {

	/** ! nie zmerguje tablic ! */
	return array_reduce($configs, function ($prev, $next) {
		return !$prev ? $next : (new OptionsResolver())->setDefaults($prev)->resolve($next);
	});
}