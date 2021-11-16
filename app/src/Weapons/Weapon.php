<?php

namespace Tournament\Weapons;

abstract class Weapon
{
    protected int $damage;

    abstract public function damage(): int;
}
