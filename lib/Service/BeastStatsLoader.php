<?php

namespace Service;

use Model\Beast;
use Service\StatsLoader;

class BeastStatsLoader extends StatsLoader
{
    public function createCombatant()
    {
        return $this->setMethods(new Beast());
    }
}