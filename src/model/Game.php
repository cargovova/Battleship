<?php

namespace src\model;

//use src\database\Connection;
/**
 * @author vova
 * Здесь вся логика игры.
 * На данный момент реализовано только задание состояния одной ячейки и её угадывание.
 */
class Game {
	/**
	 * @var object
	 */
	private $field;
	private $cellState;

	public function __construct($matrixCells) {
		$this->field = new Field($matrixCells);
// 		$pdo = new Connection();
// 		$pdo->getConnection();
	}
	
	public function setState($row, $column) {
		$this->field->setCellState($row,$column);
	}
	/**
	 * @param integer $row
	 * @param integer $column
	 * @return string[] - json
	 */
	public function play($row, $column) {
		return $this->field->getCellState($row, $column);
		}
}