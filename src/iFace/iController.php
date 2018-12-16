<?php

namespace src\iFace;
/**
 * @author vova
 */
interface iController {
	/**
	 * @param integer $row
	 * @param integer $column
	 * Функция, задающая положения кораблей
	 */
	public function setState($row, $column);
	/**
	 * @param integer $row
	 * @param integer $column
	 * Функция, возвращающая положения кораблей
	 */
	public function play($row, $column);
	/**
	 * Функция, стирающая поле для новой сессии.
	 */
	public function init();
}