<?php

namespace Tournament\Buffs;

use Tournament\Warriors\Warrior;

interface Buff
{
    public function apply(Warrior $warrior): int;
}
