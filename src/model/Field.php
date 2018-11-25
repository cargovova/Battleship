<?php
namespace src\model;

class Field
{

    const COUNT_ROW = 10;

    const COUNT_COLUMN = 10;

    public static $matrixCells;

    private $firstField;

    private $secondField;

    public function __construct()
    {
        for ($row = 0; $row < self::COUNT_ROW; $row ++) {
            for ($column = 0; $column < self::COUNT_COLUMN; $column ++) {
                $this->matrixCells[$row][$column] = new Cell('emptyIntactCell');
            }
        }
        $this->firstField = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'firstField.json';
        $this->secondField = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'secondField.json';

        file_put_contents($this->firstField, json_encode($this->matrixCells));
        file_put_contents($this->secondField, json_encode($this->matrixCells));
    }
}