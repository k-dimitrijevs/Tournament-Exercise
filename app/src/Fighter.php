<?php
namespace Tournament;

use Tournament\Inventory\Armor;
use Tournament\Inventory\Buckler;
use Tournament\Inventory\Weapon;

abstract class Fighter
{
    protected int $totalHP;
    protected int $currentHP;
    protected Weapon $weapon;

    private ?string $speciality;
    private ?Buckler $buckler = null;
    private ?Armor $armor = null;

    private int $blows = 0;

    /** an armor : reduce all received damages by 3 & reduce delivered damages by one **/
    const REDUCE_ALL_RECEIVED_DMG = 3;
    const REDUCE_DELIVERED_DMG = 1;

    /**
     *  a vicious Swordsman is a Swordsman that put poison on his weapon.
     * poison add 20 damages on two first blows
     */
    const VICIOUS_SWORDSMAN_POISON_DMG = 20;
    const VICIOUS_SWORDSMAN_POISON_BLOW_COUNT = 2;

    /**
     * a veteran Highlander goes Berserk once his hit points are under 30% of his initial total
     * once Berserk, he doubles his damages
     */
    const VETERAN_HIGHLANDER_ACTIVATES_BERSERK = 0.3; // totalHP * 0.3
    const VETERAN_HIGHLANDER_BERSERK_MULTIPLIER = 2;


    public function __construct(string $speciality = null)
    {
        $this->speciality = $speciality;
    }

    // engage
    // equip

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function getTotalHP(): int
    {
        return $this->totalHP;
    }

    public function getCurrentHP(): int
    {
        if ($this->currentHP < 0) $this->currentHP = 0;
        return $this->currentHP;
    }

    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }
}