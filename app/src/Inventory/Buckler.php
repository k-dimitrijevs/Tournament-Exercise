<?php

namespace Tournament\Inventory;

class Buckler implements Inventory
{
    private int $blocks;

    public function __construct()
    {
        $this->blocks = 3;
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