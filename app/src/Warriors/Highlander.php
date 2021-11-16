<?php

namespace Tournament\Warriors;

use Tournament\Weapons\GreatSword;
use Tournament\Weapons\Sword;

class Highlander extends Warrior
{
    public function __construct(?string $mode = null)
    {
        $this->maxHitPoints = 150;
        $this->hitPoints = 150;
        $this->weapon = new GreatSword();
        parent::__construct($mode);
    }
}
