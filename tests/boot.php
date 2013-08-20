<?php

require __DIR__ . '/../vendor/nette/tester/Tester/bootstrap.php';
require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../src/interfaces/IApiUser.php';
require __DIR__ . '/../src/interfaces/IApiAuthorizator.php';
require __DIR__ . '/../src/interfaces/IApiLogger.php';
require __DIR__ . '/../src/RestRoute.php';
require __DIR__ . '/../src/ApiResponse.php';
require __DIR__ . '/../src/ApiPresenter.php';
require __DIR__ . '/../src/JsonSchemaValidator.php';


Nette\Diagnostics\Debugger::$logDirectory = __DIR__ . '/output';

function d($v)
{
	echo \Tester\Dumper::toPhp($v) . "\n";
}
