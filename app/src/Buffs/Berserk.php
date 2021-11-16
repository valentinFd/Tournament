<?php

namespace Tournament\Buffs;

use Tournament\Warriors\Warrior;

class Berserk implements Buff
{
    public function apply(Warrior $warrior): int
    {
        if ($warrior->hitPoints() / $warrior->maxHitPoints() <= 0.3)
        {
            return $warrior->hitDamage() * 2;
        }
        return $warrior->hitDamage();
    }
}
