<?php

namespace Tournament\Inventory;

class Armor implements Inventory
{
    private int $reduceReceivedDmg;
    private int $reduceOutgoingDmg;

    public function __construct()
    {
        $this->reduceReceivedDmg = 3;
        $this->reduceOutgoingDmg = 1;
    }

    public function getReducedReceivedDmg(): int
    {
        return $this->reduceReceivedDmg;
    }

    public function getReducedOutgoingDmg(): int
    {
        return $this->reduceOutgoingDmg;
    }
}