<?php

namespace Tournament\Buffs;

use Tournament\Warriors\Warrior;

class PoisonAttack implements Buff
{
    private int $hitsLeft;

    public function __construct()
    {
        $this->hitsLeft = 2;
    }

    public function apply(Warrior $warrior): int
    {
        if ($this->hitsLeft > 0)
        {
            $this->hitsLeft--;
            return $warrior->hitDamage() + 20;
        }
        return $warrior->hitDamage();
    }
}
