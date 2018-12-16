<?php
require_once implode(DIRECTORY_SEPARATOR, [ 
		dirname(__DIR__),
		'vendor',
		'autoload.php'
]);

use src\controller\Controller;
use src\database\Connection;

const NAME_MATRIXCELLS = 'matrixCells';
const NAME_BEGIN_ROW = 'beginrow';
const NAME_BEGIN_COLUMN = 'begincolumn';
const NAME_ROW = 'row';
const NAME_COLUMN = 'column';
const NAME_INIT = 'init';
// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();
session_start();

if (isset($_SESSION[NAME_MATRIXCELLS])) {
	$matrixCells = $_SESSION[NAME_MATRIXCELLS];
} else {
	$matrixCells = [];
}
$controller = new Controller($matrixCells);
header('application/json');

// аргументы функции из js
if (isset($_REQUEST[NAME_BEGIN_ROW]) && isset($_REQUEST[NAME_BEGIN_COLUMN])) {
	$beginRow = $_REQUEST[NAME_BEGIN_ROW];
	$beginColumn = $_REQUEST[NAME_BEGIN_COLUMN];
	$beginAnswer = $controller->setState($beginRow, $beginColumn);
	echo json_encode($beginAnswer);
}
// аргументы функции из js
if (isset($_REQUEST[NAME_ROW]) && isset($_REQUEST[NAME_COLUMN])) {
	$row = $_REQUEST[NAME_ROW];
	$column = $_REQUEST[NAME_COLUMN];
	$answer = $controller->play($row, $column);
	echo json_encode($answer);
}

if (isset($_REQUEST[NAME_INIT])) {
	$controller->init();
}