<?php

require __DIR__ . '/../vendor/autoload.php';

if (!class_exists('Tester\Assert')) {
	echo "Install Nette Tester using `composer update --dev`\n";
	exit(1);
}

Tester\Environment::setup();

require __DIR__ . '/../src/Klimesf/Secured/SecuredAspect.php';
require __DIR__ . '/../src/Klimesf/Secured/Secured.php';

//
//$configurator = new Nette\Configurator;
////$configurator->addParameters(array('live' => true, 'started' => false, 'ended' => false));
//$configurator->setDebugMode(FALSE);
//$configurator->setTempDirectory(__DIR__ . '/../temp');
//$configurator->createRobotLoader()
//	->addDirectory(__DIR__)
//	->register();
//
//$configurator->addConfig(__DIR__ . '/config.neon');
//$configurator->addConfig(__DIR__ . '/config.local.neon');
//
//return $configurator->createContainer();