<?php

namespace src\iFace;

interface iController {
	public function setShipsState($fieldNumber, $row, $column, $state);
	public function play($fieldNumber, $row, $column);
}