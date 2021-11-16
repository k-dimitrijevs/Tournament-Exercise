<?php

namespace Tournament\Inventory;

class Buckler implements Inventory
{
    private string $armorType;
    private int $blocks;

    public function __construct(string $armorType, int $blocks)
    {
        $this->armorType = $armorType;
        $this->blocks = $blocks;
    }

    public function getArmorType(): string
    {
        return $this->armorType;
    }

    public function getBlocks(): int
    {
        return $this->blocks;
    }

    public function blocked(): void
    {
        $this->blocks--;
    }
}