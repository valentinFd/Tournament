<?php

namespace Tournament\Warriors;

use Tournament\Armors\Armor;
use Tournament\Buffs\Berserk;
use Tournament\Buffs\Buff;
use Tournament\Buffs\PoisonAttack;
use Tournament\Shields\Buckler;
use Tournament\Weapons\Axe;
use Tournament\Weapons\Weapon;

abstract class Warrior
{
    protected int $maxHitPoints;

    public function maxHitPoints(): int
    {
        return $this->maxHitPoints;
    }

    protected int $hitPoints;

    public function hitPoints(): int
    {
        return $this->hitPoints;
    }

    protected Weapon $weapon;

    protected ?Buckler $buckler;

    protected ?Armor $armor;

    protected ?Buff $buff;

    public function __construct(?string $mode = null)
    {
        $this->buckler = null;
        $this->armor = null;
        switch ($mode)
        {
            case 'Vicious':
                $this->buff = new PoisonAttack();
                break;
            case 'Veteran':
                $this->buff = new Berserk();
                break;
            default:
                $this->buff = null;
                break;
        }
    }

    public function engage(Warrior $warrior): void
    {
        $attacker = $this;
        $defender = $warrior;
        while ($attacker->hitPoints > 0 && $defender->hitPoints > 0)
        {
            $damage = $attacker->hitDamage();
            if ($attacker->buff !== null)
            {
                $damage = $attacker->buff->apply($attacker);
            }
            if ($defender->armor !== null)
            {
                $damage = $defender->armor->reduceIncomingDamage($damage);
            }
            if ($defender->buckler !== null)
            {
                $damage = $defender->buckler->block($damage, $attacker->weapon);
            }
            $defender->takeDamage($damage);
            $this->swapWarriors($attacker, $defender);
        }
    }

    public function hitDamage(): int
    {
        $damage = $this->weapon->damage();
        if ($this->armor !== null)
        {
            $damage -= $this->armor->outgoingDamageReduction();
        }
        return $damage;
    }

    protected function takeDamage(int $damage): void
    {
        $this->hitPoints = $this->hitPoints - $damage > 0 ? $this->hitPoints - $damage : 0;
    }

    protected function swapWarriors(Warrior &$warrior1, Warrior &$warrior2)
    {
        $tmp = $warrior1;
        $warrior1 = $warrior2;
        $warrior2 = $tmp;
    }

    public function equip(string $equipment): Warrior
    {
        switch ($equipment)
        {
            case 'buckler':
                $this->buckler = new Buckler();
                break;
            case 'armor':
                $this->armor = new Armor();
                break;
            case 'axe':
                $this->weapon = new Axe();
                break;
        }
        return $this;
    }
}
