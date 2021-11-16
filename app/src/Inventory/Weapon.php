<?php

namespace Tournament\Inventory;

class Weapon
{
    private string $weaponType;
    private int $weaponDmg;

    public function __construct(string $weaponType, int $weaponDmg)
    {
        $this->weaponType = $weaponType;
        $this->weaponDmg = $weaponDmg;
    }

    public function getWeaponType(): string
    {
        return $this->weaponType;
    }

    public function getWeaponDmg(): int
    {
        return $this->weaponDmg;
    }
}