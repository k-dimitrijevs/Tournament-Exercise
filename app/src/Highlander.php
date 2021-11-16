<?php
namespace Tournament;

use Tournament\Inventory\Sword;
use Tournament\Inventory\Weapon;

class Highlander extends Fighter
{
    public function __construct(string $speciality = null)
    {
        parent::__construct($speciality);
        $this->totalHP = 150;
        $this->currentHP = $this->totalHP;
        $this->weapon = new Sword("Great Sword", 12);
    }

    public function getHighlanderWeapon(): Weapon
    {
        return $this->weapon;
    }
}