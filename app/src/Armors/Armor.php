<?php

namespace Tournament\Armors;

class Armor
{
    private int $incomingDamageReduction;

    private int $outgoingDamageReduction;

    public function outgoingDamageReduction(): int
    {
        return $this->outgoingDamageReduction;
    }

    public function __construct()
    {
        $this->incomingDamageReduction = 3;
        $this->outgoingDamageReduction = 1;
    }

    public function reduceIncomingDamage(int $damage): int
    {
        return $damage > $this->incomingDamageReduction ? $damage - $this->incomingDamageReduction : 0;
    }
}
