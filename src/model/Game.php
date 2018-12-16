<?php

namespace src\model;

//use src\database\Connection;
/**
 * @author vova
 * Здесь вся логика игры.
 * На данный момент реализовано только задание состояния ячейки и её угадывание.
 */
class Game {
	/**
	 * @var object
	 */
	private $field;

	public function __construct($matrixCells) {
		$this->field = new Field($matrixCells);
		/*
		 * Connect к базе данных.
		 */
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
	
	public function init() {
		$this->field->init();
	}
}