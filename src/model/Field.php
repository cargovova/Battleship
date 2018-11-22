<?php
namespace battleship\model;

class Field
{

    const COUNT_ROW = 10;

    const COUNT_COLUMN = 10;

    private $cellsField;

    public function __construct()
    {
        for ($row = 0; $row < self::COUNT_ROW; $row ++) {
            for ($column = 0; $column < self::COUNT_COLUMN; $column ++) {
                $this->cellsField[$row][$column] = new Cell('emptyCell');
            }
        }
    }
}

