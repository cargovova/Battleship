<?php
namespace battleship\model;

class Cell
{

    const STATE = [
        'emptyCell' => [ // нет корабля, не битая
            'existShip' => false,
            'hitShip' => false
        ],
        'miss' => [ // нет корабля, битая
            'existShip' => false,
            'hitShip' => false
        ],
        'healthy' => [ // есть корабль, не битая
            'existShip' => true,
            'hitShip' => false
        ],
        'broken' => [ // есть корабль, битая
            'existShip' => true,
            'hitShip' => true
        ]
    ];

    private $existShip;

    private $hitShip;

    private $currentState;

    public function __construct($state)
    {
        $this->currentState = $state;
        $this->setStates($this->currentState);
    }

    private function setStates($state)
    {
        $state = 'emptyCell';
        $this->existShip = self::STATE[$state]['existShip'];
        $this->hitShip = self::STATE[$state]['hitShip'];
    }
}