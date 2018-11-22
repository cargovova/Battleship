<?php
use controller\Controller;

require_once implode(DIRECTORY_SEPARATOR, [
    dirname(__DIR__),
    'vendor',
    'autoload.php'
]);

$controller = new Controller();
$row = 0; // будет передаваться из html
$column = 0; // будет передаваться из html
$controller->checkHit($row, $column);