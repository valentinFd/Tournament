<?php

namespace Tournament\Shields;

use Tournament\Weapons\Weapon;

class Buckler
{
    private int $hitPoints;

    private int $cooldown;

    public function __construct()
    {
        $this->hitPoints = 3;
        $this->cooldown = 1;
    }

    public function block(int $damage, Weapon $weapon): int
    {
        if ($this->hitPoints > 0)
        {
            if ($this->cooldown === 0)
            {
                $damage = 0;
                if (is_a($weapon, 'Tournament\Weapons\Axe'))
                {
                    $this->hitPoints--;
                }
            }
            $this->cooldown = $this->cooldown === 0 ? 1 : 0;
        }
        return $damage;
    }
}
