<?php

namespace src\model;
/**
 * @author vova
 *        
 * Класс для одной ячейки поля.
 * Есть set и get.
 */
class Cell {
	/**
	 * @var boolean
	 * @var boolean 
	 */
	const BEGIN_STATE = false;
	const SHIP_CELL = true;
	/**
	 * @var boolean
	 * @var integer
	 * @var integer
	 */
	public $currentState;
	public $row;
	public $column;
	/**
	 * Вызываем в construct метод setState чтобы задать значения при инициализации
	 */
	public function __construct($row, $column) {
		$this->setState($row, $column, self::BEGIN_STATE);
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @param boolean $currentState
	 * Функция задающая значение ячейке
	 */
	public function setState($row, $column, $state) {
		$this->row = $row;
		$this->column = $column;
		if ($state === null) {
			$this->currentState = self::SHIP_CELL;
		} else {
		$this->currentState = $state;
		}
	}
	/**
	 * @return integer|integer|boolean
	 */
	public function getState() {
		return [ 
				result => $this->currentState
		];
	}
}