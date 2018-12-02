<?php

namespace src\model;

class Game {
	private $field;
	private $cellState;

	public function __construct() {
		$this->field = new Field();
	}

	public function setShipsState($fieldNumber, $row, $column, $state) {
		$this->field->setCellState($fieldNumber, $row, $column, $state);
	}

	public function play($fieldNumber, $row, $column) {
		$this->cellState = $this->field->getCellState($fieldNumber, $row, $column);
		if ($this->cellState === true) {
			return [
					result => true
			];
		} else {
			return [
					result => false
			];
		}
	}
}