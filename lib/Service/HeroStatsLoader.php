<?php

namespace Service;

use Service\StatsLoader;
use Model\Hero;

class HeroStatsLoader extends StatsLoader
{
    public function createCombatant()
    {
        return $this->setMethods(new Hero());
    }
}