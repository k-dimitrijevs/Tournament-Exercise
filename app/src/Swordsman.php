<?php

namespace Tournament;

use Tournament\Inventory\Weapon;

class Swordsman extends Fighter
{
    public function __construct(string $speciality = null)
    {
        parent::__construct($speciality);
        $this->totalHP = 100;
        $this->currentHP = $this->totalHP;
        $this->weapon = new Weapon("1 hand sword", 5);
    }
}
