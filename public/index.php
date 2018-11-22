<?php
require_once implode(DIRECTORY_SEPARATOR, [
    dirname(__DIR__),
    'vendor',
    'autoload.php'
]);
use battleship\model\Field;
$a = new Field();

echo "<pre>";
print_r($a);
echo "</pre>";