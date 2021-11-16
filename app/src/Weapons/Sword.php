<?php

namespace Tournament\Weapons;

class Sword extends Weapon
{
    public function __construct()
    {
        $this->damage = 5;
    }

    public function damage(): int
    {
        return $this->damage;
    }
}
