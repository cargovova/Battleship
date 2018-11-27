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
        return [
            result => false
        ];
    }

    // игра. Проблема с fieldNumber. Если поставить вместо него firstField - всё работает.
    public function action($fieldNumber, $row, $column)
    {
        if ($this->field->$fieldNumber[$row][$column]->currentState === 'emptyIntactCell') {
            return  [
                result => 'wasted'
            ];
        } elseif ($this->field->$fieldNumber[$row][$column]->currentState === 'intactShip') {
            return [
                result => 'miss'
            ];
        }
    }
}