<?php

namespace src\controller;

use src\iFace\iController;
use src\model\Game;

/**
 * @author vova
 *
 */
class Controller implements iController {
	private $game;

	public function __construct() {
		$this->game = new Game();
	}

	/**
	 * {@inheritDoc}
	 * @see \src\iFace\iController::setShipsState()
	 */
	public function setShipsState($fieldNumber, $row, $column, $state) {
		$this->game->setShipsState($fieldNumber, $row, $column, $state);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \src\iFace\iController::play()
	 */
	public function play($fieldNumber, $row, $column) {
		return $this->game->play($fieldNumber, $row, $column);
	}
}