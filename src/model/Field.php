<?php
namespace src\model;

class Field
{

    const COUNT_ROW = 10;
    const COUNT_COLUMN = 10;

    public $matrixCells;
    public $firstField;
    public $secondField;

    public function __construct()
    {
        for ($row = 0; $row < self::COUNT_ROW; $row ++) {
            for ($column = 0; $column < self::COUNT_COLUMN; $column ++) {
                $this->matrixCells[$row][$column] = new Cell('emptyIntactCell');
                $this->firstField = $this->matrixCells;
                $this->secondField = $this->matrixCells;
            }
        }
    }

    // Записываем в ячейку корабль.
    public function setFieldState($fieldNumber, $row, $column, $state)
    {
        $this->$fieldNumber[$row][$column]->currentState = $state;
    }
    // Получаем значение битой ячейки.
    public function getFieldState($fieldNumber, $row, $column)
    {
        if ($this->$fieldNumber[$row][$column]->currentState === 'emptyIntactCell') {
            return [
                result => 'wasted'
            ];
        } elseif ($this->$fieldNumber[$row][$column]->currentState === 'intactShip') {
            return [
                result => 'miss'
            ];
        }
    }
}