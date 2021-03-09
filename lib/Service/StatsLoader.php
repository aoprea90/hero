<?php

namespace Service;

use Model\Combatant;
use Model\MagicSkills;

class StatsLoader
{
    protected $storage;

    protected $data;

    public function __construct(StatsStorage $storage)
    {
        $this->storage = $storage;
        $this->data = $storage->fetchAll()[0];
    }

    public function createCombatant() {
        if ($this->storage->getName() == 'hero') {
            $combatant = new HeroStatsLoader($this->storage);
            return $combatant->createCombatant();
        } else {
            $combatant = new BeastStatsLoader($this->storage);
            return $combatant->createCombatant();
        }
    }

    protected function setMethods(Combatant $combatant) : Combatant
    {
        foreach ($this->data as $key => $stat) {
            $setMethod = sprintf('set%s', ucfirst($key));

            if (!in_array($key, MagicSkills::getMagicMethods())) {
                $combatant->$setMethod($stat);
            } else {
                $combatant->$setMethod($stat);
            }
        }

        return $combatant;
    }

}