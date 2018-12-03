<?php

namespace src\model;

/**
 * @author vova
 *
 */
class Field {
	/**
	 * @var integer
	 * @var integer
	 */
	const COUNT_ROW = 10;
	const COUNT_COLUMN = 10;
	
	private $matrixCells;

	/**
	 * Создание массива и присвоение этого массива переменным $firstField и $secondField
	 * Каждый элемент массива - объект Cell.
	 */
	public function __construct() {
		for($row = 0; $row < self::COUNT_ROW; $row ++) {
			for($column = 0; $column < self::COUNT_COLUMN; $column ++) {
				$this->matrixCells[$row][$column] = new Cell();
			}
		}
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @param string $state
	 * 
	 * Записываем в ячейку корабль.
	 */
	public function setCellState($row, $column, $state) {
		$this->matrixCells[$row][$column]->setState($state);
	}

	/**
	 * @param integer $row
	 * @param integer $column
	 * @return string
	 */
	public function getCellState($row, $column) {
		return $this->matrixCells[$row][$column]->getState();
	}
}