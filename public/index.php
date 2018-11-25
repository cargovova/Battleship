<?php
require_once implode(DIRECTORY_SEPARATOR, [
    dirname(__DIR__),
    'vendor',
    'autoload.php'
]);

use src\controller\Controller;

$controller = new Controller();
$row = 0;
$column = 0;
$controller ->checkHit($row, $column);