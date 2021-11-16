<?php

namespace Tournament\Inventory;

interface Weapon
{
    public function weaponType(): string;
    public function weaponDmg(): int;
}