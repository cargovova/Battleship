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
session_start();

if (isset($_SESSION['matrixCells'])) {
	$matrixCells = $_SESSION['matrixCells'];
} else {
	$matrixCells = [];
}
$controller = new Controller($matrixCells);
header('application/json');

	// $beginRow = 1;
	// $beginColumn = 1;
// аргументы функции из js
if (isset($_REQUEST['beginrow']) && isset($_REQUEST['begincolumn'])) {
	$beginRow = $_REQUEST['beginrow'];
	$beginColumn = $_REQUEST['begincolumn'];
// 	$beginRow = 1;
// 	$beginColumn = 1;
	$beginAnswer = $controller->setState($beginRow, $beginColumn);
	echo json_encode($beginAnswer);
}
// аргументы функции из js
if (isset($_REQUEST['row']) && isset($_REQUEST['column'])) {
	$row = $_REQUEST['row'];
	$column = $_REQUEST['column'];
	$answer = $controller->play($row, $column);
	echo json_encode($answer);
}

if (isset($_REQUEST['init'])) {
	$controller->init();
	echo json_encode([state => 'clear',
			session => $_SESSION['matrixCells']
	]);
}