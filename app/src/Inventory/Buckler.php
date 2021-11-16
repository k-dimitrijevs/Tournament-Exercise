<?php

namespace Tournament\Inventory;

class Buckler
{
    private string $armorType;

    public function __construct(string $armorType)
    {
        $this->armorType = $armorType;
    }

    public function getArmorType(): string
    {
        return $this->armorType;
    }
}