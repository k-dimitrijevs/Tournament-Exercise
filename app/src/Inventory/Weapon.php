<?php

namespace Tournament\Inventory;

interface Weapon
{
    public function weaponDmg(): int;
    public function weaponType(): string;
}