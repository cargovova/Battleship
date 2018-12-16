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
	const NAME_SESSION_VARIABLE = 'matrixCells';
	
	private $matrixCells;
	/**
	 * Создание массива
	 * Каждый элемент массива - объект Cell.
	 */
	public function __construct($matrixCells) {
		if (count($matrixCells) === 0) {
			for($row = 0; $row < self::COUNT_ROW; $row ++) {
				for($column = 0; $column < self::COUNT_COLUMN; $column ++) {
					$this->matrixCells[] = new Cell($row, $column);
				}
			}
		} else {
			$this->matrixCells = $matrixCells;
		}
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @param string $state
	 */
	public function setCellState($row, $column) {
		foreach ($this->matrixCells as $cell) {
			if ($cell->row == $row && $cell->column == $column) {
				$cell->setState($row, $column);
			}
		}
		$_SESSION[self::NAME_SESSION_VARIABLE] = $this->matrixCells;
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @return string
	 */
	public function getCellState($row, $column) {
		foreach ($this->matrixCells as $cell) {
			if ($cell->row == $row && $cell->column == $column) {
				return $cell->getState();
			}
		}
	}
	
	public function init() {
		$_SESSION[self::NAME_SESSION_VARIABLE] = [];
	}
}