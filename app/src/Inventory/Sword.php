<?php

namespace Tournament\Inventory;

class Sword implements Weapon
{
    private string $weaponType;
    private int $weaponDmg;

    public function __construct(string $weaponType, int $weaponDmg)
    {
        $this->weaponType = $weaponType;
        $this->weaponDmg = $weaponDmg;
    }

    public function weaponType(): string
    {
        return $this->weaponType;
    }

    public function weaponDmg(): int
    {
        return $this->weaponDmg;
    }
}