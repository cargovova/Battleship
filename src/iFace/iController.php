<?php

namespace src\iFace;

/**
 * @author vova
 *
 */
interface iController {
	/**
	 * @param string $fieldNumber
	 * @param integer $row
	 * @param integer $column
	 * @param integer $state
	 */
	public function setShipsState($fieldNumber, $row, $column, $state);
	/**
	 * @param string $fieldNumber
	 * @param integer $row
	 * @param integer $column
	 */
	public function play($fieldNumber, $row, $column);
}