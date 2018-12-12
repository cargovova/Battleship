<?php

namespace src\iFace;

/**
 * @author vova
 *
 */
interface iController {
	/**
	 * @param integer $row
	 * @param integer $column
	 */
	public function setState($row, $column);
	/**
	 * @param integer $row
	 * @param integer $column
	 */
	public function play($row, $column);
}