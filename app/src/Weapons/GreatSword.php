<?php

namespace Tournament\Weapons;

class GreatSword extends Weapon
{
    private int $hitsLeft;

    private int $cooldown;

    public function __construct()
    {
        $this->damage = 12;
        $this->cooldown = 0;
        $this->hitsLeft = 2;
    }

    public function damage(): int
    {
        if ($this->cooldown === 0)
        {
            $this->hitsLeft--;
            if ($this->hitsLeft === 0)
            {
                $this->cooldown = 1;
            }
            return $this->damage;
        }
        else
        {
            $this->cooldown--;
            $this->hitsLeft = 2;
            return 0;
        }
    }
}
