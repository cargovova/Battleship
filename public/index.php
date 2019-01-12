<?php
require_once implode(DIRECTORY_SEPARATOR, [
		dirname(__DIR__),
		'vendor',
		'autoload.php'
]);

use PDO;
use PDOException;
use src\database\Connection;
const BEGIN_FIELD = 'begin_field';

Connection::insertInto(BEGIN_FIELD, 2, 2, true);

// try {
// 	$pdo = new PDO ('pgsql:host=127.0.0.1;port=5432;dbname=battleship', 'battleship', 'battleship');
// 	$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	$sqlQuery = "INSERT INTO begin_field VALUES (1, 1, false);";
// 	// $command = $pdo->prepare($sqlQuery);
// 	// $command->execute($sqlQuery);
// 	$pdo->query($sqlQuery);
// 	echo 'sucsess';
// } catch (PDOException $e) {
// 	echo $e->getMessage ();
// }

// $command = $pdo->prepare (
// "INSERT INTO begin_field('row', 'column', state) VALUES (1, 1, false)");
// $command->execute("INSERT INTO `begin_field` ('row', 'column', state) VALUES (1, 1, false)");

// echo "hi";
// $test = new Test();
// var_dump($test);
// echo "HI";
// $test->getConnection();

// $command = self::$connection->prepare (
// "INSERT INTO begin_field(`row`, `column`, `state`) VALUES (1, 1, false);");
// $command->execute();


// Connection::insertInto('begin_field', 1, 1, false);

// require_once implode(DIRECTORY_SEPARATOR, [ 
// 		dirname(__DIR__),
// 		'vendor',
// 		'autoload.php'
// ]);

// use src\controller\Controller;
// use src\database\Connection;

// const NAME_MATRIXCELLS = 'matrixCells';
// const NAME_BEGIN_ROW = 'beginrow';
// const NAME_BEGIN_COLUMN = 'begincolumn';
// const NAME_ROW = 'row';
// const NAME_COLUMN = 'column';
// const NAME_INIT = 'init';
// // $whoops = new \Whoops\Run;
// // $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// // $whoops->register();
// session_start();

// if (isset($_SESSION[NAME_MATRIXCELLS])) {
// 	$matrixCells = $_SESSION[NAME_MATRIXCELLS];
// } else {
// 	$matrixCells = [];
// }
// $controller = new Controller($matrixCells);
// header('application/json');

// // аргументы функции из js
// if (isset($_REQUEST[NAME_BEGIN_ROW]) && isset($_REQUEST[NAME_BEGIN_COLUMN])) {
// 	$beginRow = $_REQUEST[NAME_BEGIN_ROW];
// 	$beginColumn = $_REQUEST[NAME_BEGIN_COLUMN];
// 	$beginAnswer = $controller->setState($beginRow, $beginColumn);
// 	echo json_encode($beginAnswer);
// }
// // аргументы функции из js
// if (isset($_REQUEST[NAME_ROW]) && isset($_REQUEST[NAME_COLUMN])) {
// 	$row = $_REQUEST[NAME_ROW];
// 	$column = $_REQUEST[NAME_COLUMN];
// 	$answer = $controller->play($row, $column);
// 	echo json_encode($answer);
// }

// if (isset($_REQUEST[NAME_INIT])) {
// 	$controller->init();
// }