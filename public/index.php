<?php
require_once implode(DIRECTORY_SEPARATOR, [ 
		dirname(__DIR__),
		'vendor',
		'autoload.php'
]);

use src\controller\Controller;
use src\database\Connection;

// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();
$controller = new Controller();

// аргументы функции из js
$controller->setState(2, 2);

// аргументы функции из js
$row = $_REQUEST ['y'];
$column = $_REQUEST ['x'];
$answer = $controller->play($row, $column);

header('application/json');
echo json_encode($answer);