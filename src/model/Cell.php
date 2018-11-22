<?php
namespace model;

class Cell
{

    const CELL_STATE = [
        'emptyIntactCell' => 'emptyIntactCell', // нет корабля, не битая
        'wasted' => 'wasted',                   // нет корабля, битая
        'intactShip' => 'intactShip',           // есть корабль, не битая
        'miss' => 'miss'                        // есть корабль, битая
    ];

    private $currentState;

    public function __construct($state)
    {
        $this->currentState = $state;
        $this->setState($this->currentState);
    }

    public function setState($state)
    {
        $this->currentState = self::CELL_STATE[$state];
    }
}