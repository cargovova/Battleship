<?php

namespace src\model;

/**
 * @author vova
 * Здесь вся логика игры.
 * На данный момент реализовано только задание состояния одной ячейки и её угадывание.
 */
class Game {
	/**
	 * @var array
	 * @var array
	 */
	const RESULT_ACTION = [
			'hit' => 'hit',
			'miss' => 'miss'
	];
	const FIELD_NAMES = [
			'firstField' => 'firstField.json',
			'secondField' => 'secondField.json'
	];
	
	/**
	 * @var array
	 * @var array
	 * @var string
	 */
	private $firstField;
	private $secondField;
	private $cellState;

	public function __construct() {
		$this->firstField = new Field();
		$this->secondField = new Field();
		$this->writeToFile(self::FIELD_NAMES['firstField'], $this->firstField);
		$this->writeToFile(self::FIELD_NAMES['secondField'], $this->secondField);
	}

	/**
	 * @param string $fieldNumber
	 * @param integer $row
	 * @param integer $column
	 * @param string $state
	 */
	public function setShipsState($fieldNumber, $row, $column, $state) {
		$this->$fieldNumber->setCellState($row, $column, $state);
	}

	/**
	 * @param string $fieldNumber
	 * @param integer $row
	 * @param integer $column
	 * @return string[] - json
	 */
	public function play($fieldNumber, $row, $column) {
		$this->cellState = $this->$fieldNumber->getCellState($row, $column);
		if ($this->cellState === true) {
			return [
					result => self::RESULT_ACTION['hit']
			];
		} else {
			return [
					result => self::RESULT_ACTION['miss']
			];
		}
	}
	
	/**
	 * @param string $fieldName
	 * @param array $fieldState
	 */
	private function writeToFile($fieldName, $fieldState) {
		$filePath = dirname(__DIR__) . DIRECTORY_SEPARATOR .
		'database' . DIRECTORY_SEPARATOR . $fieldName;
		file_put_contents($filePath, json_encode($fieldState));
	}
}