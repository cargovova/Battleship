<?php

namespace src\model;

/**
 * @author vova
 *
 */
class Field {
	/**
	 * @var integer
	 */
	const COUNT_ROW = 10;
	const COUNT_COLUMN = 10;

	/**
	 * @var array
	 */
	private $firstField;
	private $secondField;

	/**
	 * Создание массива и присвоение этого массива переменным $firstField и $secondField
	 * Каждый элемент массива - объект Cell.
	 */
	public function __construct() {
		for($row = 0; $row < self::COUNT_ROW; $row ++) {
			for($column = 0; $column < self::COUNT_COLUMN; $column ++) {
				$this->firstField[$row][$column] = new Cell();
				$this->secondField[$row][$column] = new Cell();
			}
		}
	}
	/**
	 * @param string $fieldNumber
	 * @param integer $row
	 * @param integer $column
	 * @param string $state
	 * 
	 * Записываем в ячейку корабль.
	 */
	public function setCellState($fieldNumber, $row, $column, $state) {
		$this->$fieldNumber[$row][$column]->setState($state);
	}

	/**
	 * @param string $fieldNumber
	 * @param integer $row
	 * @param integer $column
	 * @return string
	 */
	public function getCellState($fieldNumber, $row, $column) {
		return $this->$fieldNumber[$row][$column]->getState();
	}
}