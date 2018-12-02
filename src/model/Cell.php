<?php

namespace src\model;

/**
 *
 * @author vova
 *        
 * Класс для одной ячейки поля.
 * Есть set и get.
 *        
 */
class Cell {
	/**
	 * @var array
	 */
	const CELL_STATE = [ 
			'empty' => false,
			'ship' => true
	];
	public $currentState;
	/**
	 * @param string $state
	 * Задаём ячейке пустое значение при инициализации
	 */
	public function __construct() {
		if ($this->currentState === null) {
			$this->setState($this->currentState);
		}
	}
	/**
	 * @param string $state
	 * Функция задающая значение ячейке
	 */
	public function setState($state) {
		$this->currentState = self::CELL_STATE[$state];
	}
	/**
	 * @param string $state
	 * @return string
	 * Функция получающая значение ячейки
	 */
	public function getState() {
		return $this->currentState;
	}
}