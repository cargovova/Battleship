<?php

namespace src\controller;

use src\iFace\iController;
use src\model\Game;

class Controller implements iController {
	private $game;

	public function __construct() {
		// инициализация игры
		$this->game = new Game();
	}

	// задаём положения кораблей
	public function setShipsState($fieldNumber, $row, $column, $state) {
		$this->game->setShipsState($fieldNumber, $row, $column, $state);
	}

	public function play($fieldNumber, $row, $column) {
		return $this->game->play($fieldNumber, $row, $column);
	}
}