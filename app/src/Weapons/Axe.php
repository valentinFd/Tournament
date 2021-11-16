<?php

namespace Tournament\Weapons;

class Axe extends Weapon
{
    public function __construct()
    {
        $this->damage = 6;
    }

    public function damage(): int
    {
        return $this->damage;
    }
}
