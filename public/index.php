<?php
require_once implode(DIRECTORY_SEPARATOR, [
    dirname(__DIR__),
    'vendor',
    'autoload.php'
]);

use src\controller\Controller;

$controller = new Controller();

// аргументы функции из js
// $fieldNumber = 1;
// $row = $_REQUEST['y'];
// $column = $_REQUEST['x'];
// $state = 'intactShip';
// $answer = $controller->setState($fieldNumber, $row, $column, $state);


// аргументы функции из js
$row = $_REQUEST['y'];
$column = $_REQUEST['x'];
$fieldNumber = $_REQUEST['fieldNumber'];
$answer = $controller ->action($fieldNumber, $row, $column);

header('application/json');
echo json_encode($answer);