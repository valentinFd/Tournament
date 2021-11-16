<?php

namespace Tournament\Warriors;

use Tournament\Weapons\Axe;

class Viking extends Warrior
{
    public function __construct(?string $mode = null)
    {
        $this->maxHitPoints = 120;
        $this->hitPoints = 120;
        $this->weapon = new Axe();
        parent::__construct($mode);
    }
}
