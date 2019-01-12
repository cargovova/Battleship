<?php

namespace src\model;

/**
 * @author vova
 * Здесь вся логика игры.
 * На данный момент реализовано только задание состояния ячейки и её угадывание.
 */
class Game {
	const COUNT_SHIP = 'countShip';
	const COUNT_HIT = 'countHit';
	const FIRST_SHIP = 1;
	/**
	 * @var object
	 */
	private $field;
	private $sellState;

	public function __construct($matrixCells) {
		$this->field = new Field($matrixCells);
	}
	/**
	 * @return boolean
	 * Обе величины увеличиваются на 1, поэтому можно их сравнивать.
	 */
	public function compareVariable() {
		if (Singleton::getShipInstance() === Singleton::getHitInstance()) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 */
	public function setState($row, $column) {
		$this->field->setCellState($row,$column);
		return [countShip => Singleton::getShipInstance()];
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @return string[] - json
	 */
	public function play($row, $column) {
		$this->sellState = $this->field->getCellState($row, $column);
		return [
				result => $this->sellState,
				iswin => self::compareVariable(),
				first => Singleton::getShipInstance(),
				second => Singleton::getHitInstance()
		];
	}

	public function init() {
		$this->field->init();
		$_SESSION[self::COUNT_HIT] = 0;
		$_SESSION[self::COUNT_SHIP] = 0;
	}
}