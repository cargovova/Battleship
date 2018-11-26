<?php
require_once implode(DIRECTORY_SEPARATOR, [
    dirname(__DIR__),
    'vendor',
    'autoload.php'
]);

use src\controller\Controller;

$controller = new Controller();

// аргументы функции из js
$fieldNumber = 1;
$row = 1;
$column = 1;
$state = 'intactShip';
$controller->setState($fieldNumber, $row, $column, $state);

// аргументы функции из js
$row = 0;
$column = 0;
$controller ->action($row, $column);