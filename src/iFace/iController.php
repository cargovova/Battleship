<?php
namespace src\iFace;

interface iController
{
    public function setState($fieldNumber, $row, $column, $state);
    public function action($fieldNumber, $row, $column);
}