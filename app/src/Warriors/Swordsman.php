<?php

namespace Tournament\Warriors;

use Tournament\Weapons\Sword;

class Swordsman extends Warrior
{
    public function __construct(?string $mode = null)
    {
        $this->maxHitPoints = 100;
        $this->hitPoints = 100;
        $this->weapon = new Sword();
        parent::__construct($mode);
    }
}
