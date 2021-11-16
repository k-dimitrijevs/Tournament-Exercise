<?php
namespace Tournament;

use Tournament\Inventory\Armor;
use Tournament\Inventory\Axe;
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
    const VETERAN_HIGHLANDER_ACTIVATES_BERSERK = 0.3;
    const VETERAN_HIGHLANDER_BERSERK_MULTIPLIER = 2;


    public function __construct(string $speciality = null)
    {
        $this->speciality = $speciality;
    }

    public function engage(Fighter $fighter)
    {
        $attacker = $fighter;
        $defender = $this;

        while (true)
        {
            // Putting hit point checking in while statement breaks tests. (Forever loading)
            if ($fighter->hitPoints() <= 0 || $this->hitPoints() <= 0) break;

            $attacker = $attacker === $fighter ? $this : $fighter;
            $defender = $defender === $this ? $fighter : $this;

            $attacker->madeBlow();

            if ($attacker->getBlows() % 2 === 0 &&
                !is_null($defender->buckler) &&
                $defender->buckler->getBlocks() > 0)
            {
                if ($attacker->weapon instanceof Axe) $defender->buckler->blocked();
            } else
            {
                if ($attacker->weapon->weaponType() === "Great Sword")
                {
                    if ($attacker->getBlows() % 3 !== 0)
                    {
                        $attacker->blow($defender);
                    }
                } else
                {
                    $attacker->blow($defender);
                }
            }
        }
    }

    public function equip(string $item): Fighter
    {
        switch ($item)
        {
            // Can add more cases e.g. case "sword" -> creates new Sword etc.
            case "buckler":
                $this->buckler = new Buckler();
                break;
            case "armor":
                $this->armor = new Armor();
                break;
            case "axe":
                $this->weapon = new Axe("1 hand axe", 6);
                break;
        }
        return $this;
    }

    public function hitPoints(): int
    {
        if ($this->currentHP < 0) $this->currentHP = 0;
        return $this->currentHP;
    }

    public function blow(Fighter $fighter): void
    {
        if ($this->speciality === "Vicious" && $this->getBlows() <= self::VICIOUS_SWORDSMAN_POISON_BLOW_COUNT)
        {
            $fighter->receiveBlow($this->weapon->weaponDmg() + self::VICIOUS_SWORDSMAN_POISON_DMG);
            return;
        }

        if ($this->speciality === "Veteran" && $this->hitPoints() <= $this->totalHP * self::VETERAN_HIGHLANDER_ACTIVATES_BERSERK)
        {
            $fighter->receiveBlow($this->weapon->weaponDmg() * self::VETERAN_HIGHLANDER_BERSERK_MULTIPLIER);
            return;
        }

        if (!is_null($this->armor))
        {
            $fighter->receiveBlow($this->weapon->weaponDmg() - $this->armor->getReducedOutgoingDmg());
            return;
        }

        $fighter->receiveBlow($this->weapon->weaponDmg());
    }

    public function receiveBlow(int $dmg): void
    {
        if (!is_null($this->armor))
        {
            $this->currentHP -= $dmg - $this->armor->getReducedReceivedDmg();
        } else
        {
            $this->currentHP -= $dmg;
        }
    }

    public function madeBlow(): void
    {
        $this->blows++;
    }

    public function getBlows(): int
    {
        return $this->blows;
    }
}