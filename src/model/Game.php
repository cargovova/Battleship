<?php

namespace src\model;

//use src\database\Connection;
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
		/*
		 * Connect к базе данных.
		 */
// 		$pdo = new Connection();
// 		$pdo->getConnection();
	}
	/**
	 * @return boolean
	 */
	public function compareVariable() {
		if ($_SESSION[self::COUNT_SHIP] === $_SESSION[self::COUNT_HIT]) {
			return true;
		}
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 */
	public function setState($row, $column) {
		$this->field->setCellState($row,$column);
		if (isset($_SESSION[self::COUNT_SHIP])) {
			++$_SESSION[self::COUNT_SHIP];
		} else {
			$_SESSION[self::COUNT_SHIP] = self::FIRST_SHIP;
		}
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @return string[] - json
	 */
	public function play($row, $column) {
		$this->sellState = $this->field->getCellState($row, $column);
		if (isset($_SESSION[self::COUNT_HIT])) {
			++$_SESSION[self::COUNT_HIT];
		} else {
			$_SESSION[self::COUNT_HIT] = self::FIRST_SHIP;
		}
		return [
				result => $this->sellState,
				iswin => self::compareVariable()
		];
	}

	public function init() {
		$this->field->init();
		$_SESSION[self::COUNT_HIT] = 0;
		$_SESSION[self::COUNT_SHIP] = 0;
	}
}