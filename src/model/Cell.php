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
	 * @var string
	 * @var array
	 */
	const BEGIN_CELL_STATE = 'empty';
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
		$this->setState(self::BEGIN_CELL_STATE);
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