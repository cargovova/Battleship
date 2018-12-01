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
    public function setState($fieldNumber, $row, $column, $state)
    {
        $this->field->setFieldState($fieldNumber, $row, $column, $state);
    }

    // игра. Проблема с fieldNumber. Если поставить вместо него firstField - всё работает.
    public function action($fieldNumber, $row, $column)
    {
        return $this->field->getFieldState($fieldNumber, $row, $column);
    }
}