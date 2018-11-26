<?php
namespace src\controller;

use src\iFace\iController;
use src\model\Field;

class Controller implements iController
{

    public $field;

    public function __construct()
    {
        // инициализация поля с пустыми ячейками
        $this->field = new Field();
    }
    // задаём положения кораблей
    public function setState($fieldNumber, $row, $column, $state) {
        $this->field->setFieldState($fieldNumber, $row, $column, $state);
    }
    // игра
    public function action($row, $column)
    {
        if ($this->field->matrixCells[$row][$column]->currentState === 'emptyIntactCell') {
            echo "HI";
        }
        echo "<pre>";
        var_dump($this->field->matrixCells[$row][$column]);
        echo "</pre>";
    }
}