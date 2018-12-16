<?php

namespace src\model;

/**
 * @author vova
 */
class Field {
	/**
	 *
	 * @var integer
	 * @var integer
	 * @var string
	 */
	const COUNT_ROW = 10;
	const COUNT_COLUMN = 10;
	const MATRIX_CELLS = 'matrixCells';
	
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
	 * @return object
	 * Функция, созданная для предотвращения повтора кода.
	 */
	public function foreachMatrixCells($row, $column) {
		foreach ($this->matrixCells as $cell) {
			if ($cell->row == $row && $cell->column == $column) {
				return $cell;
			}
		}
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 */
	public function setCellState($row, $column) {
		self::foreachMatrixCells($row, $column)->setState($row, $column);
		$_SESSION[self::MATRIX_CELLS] = $this->matrixCells;
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @return string
	 */
	public function getCellState($row, $column) {
		return self::foreachMatrixCells($row, $column)->getState();
	}

	public function init() {
		$_SESSION[self::MATRIX_CELLS] = [ ];
	}
}