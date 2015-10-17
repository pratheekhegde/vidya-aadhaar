<?php

return array(
	'slim' => array(
		'templates.path' => __DIR__.'/templates',
		'log.enabled' => false,
	),
	'cookies' => array(),
	'view' => new Slim\Views\Twig(),
	'some.api.key' => 'hjhk'
);

?>