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
    // задаём по одному одиночному кораблю в каждом поле.
    public function setFieldState($fieldNumber, $row, $column, $state)
    {
        if ($fieldNumber === 1) {
            $this->firstField[$row][$column] = new Cell($state);
        } elseif ($fieldNumber ===2) {
            $this->secondField[$row][$column] = new Cell($state);
        }
    }
}