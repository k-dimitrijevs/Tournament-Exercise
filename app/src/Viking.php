<?php
namespace Tournament;

use Tournament\Inventory\Weapon;

class Viking extends Fighter
{
    public function __construct(string $speciality = null)
    {
        parent::__construct($speciality);
        $this->totalHP = 120;
        $this->currentHP = $this->totalHP;
        $this->weapon = new Weapon("1 hand axe", 6);
    }
}