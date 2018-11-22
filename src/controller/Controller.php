<?php
namespace controller;

use model\Field;
use iFace\iController;

class Controller implements iController
{

    private $field;

    public function __construct()
    {
        $this->field = new Field();
    }

    public function checkHit($row, $column)
    {
        echo "<pre>";
        var_dump($this->field->matrixCells[$row][$column]);
        echo "</pre>";
    }
}