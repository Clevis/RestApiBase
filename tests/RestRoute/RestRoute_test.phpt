<?php
require __DIR__ . '/../boot.php';
use Tester\Assert;

use Nette\Http;
use Nette\Application;
use Clevis\RestApi\RestRoute;


$url = new Http\UrlScript('http://doma.in/api/resource/1');
$request = new Http\Request(
	$url,
	NULL /*$query*/, NULL /*$post*/, NULL /*$files*/, NULL /*$cookies*/, NULL /*$headers*/,
	Http\Request::DELETE);

$route = new RestRoute('/api/resource/<id>', 'Resource:');

$match = $route->match($request);

Assert::equal(
	new Application\Request('Resource', 'DELETE', ['id' => '1', 'action' => 'delete'], [], [], ['secured' => FALSE]),
	$match);
