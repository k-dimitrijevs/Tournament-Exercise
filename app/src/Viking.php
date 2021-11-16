<?php
namespace Tournament;

use Tournament\Inventory\Axe;

class Viking extends Fighter
{
    public function __construct(string $speciality = null)
    {
        parent::__construct($speciality);
        $this->totalHP = 120;
        $this->currentHP = $this->totalHP;
        $this->weapon = new Axe("1 hand axe", 6);
    }
}