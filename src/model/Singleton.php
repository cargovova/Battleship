<?php

namespace src\model;

class Singleton {
	
	const BEGIN_VALUE = 1;
	const NAME_COUNT_SHIP = 'countShip';
	const NAME_COUNT_HIT = 'countHit';
	const NAME_MATRIX_CELLS = 'matrixCells';
	
	private static $countShip;
	
	private function counter($sessionName) {
		if (isset($_SESSION[$sessionName])) {
			++ $_SESSION[$sessionName];
		} else {
			$_SESSION[$sessionName] = self::BEGIN_VALUE;
		}
		return $_SESSION[$sessionName];

	}
	
	public static function getShipInstance() {
		return self::counter(self::NAME_COUNT_SHIP);
	}

	public static function getHitInstance() {
		return self::counter(self::NAME_COUNT_HIT);
	}
	
	public static function getMatrixCellsInstance($variableValue) {
		self::counter(self::NAME_MATRIX_CELLS, $variableValue);
	}
	
	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}
}