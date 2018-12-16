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

	public function __construct($matrixCells) {
		$this->game = new Game($matrixCells);
	}
	/**
	 * {@inheritDoc}
	 * @see \src\iFace\iController::setState()
	 */
	public function setState($row, $column) {
		$this->game->setState($row, $column);
	}
	/**
	 * {@inheritDoc}
	 * @see \src\iFace\iController::play()
	 */
	public function play($row, $column) {
		return $this->game->play($row, $column);
	}
	/**
	 * {@inheritDoc}
	 * @see \src\iFace\iController::init()
	 */
	public function init() {
		$this->game->init();
	}
}