<?php

namespace Service;

use Model\Beast;
use Model\Combatant;
use Model\Hero;
use Model\MagicSkills;

class StatsLoader
{
    private $storage;

    private $data;

    public function __construct(StatsStorage $storage)
    {
        $this->storage = $storage;
        $this->data = $storage->fetchAll()[0];
    }

    public function createCombatant(): Combatant
    {
        if ($this->storage->getName() == 'hero') {
            $combatant = new Hero();
        } else {
            $combatant = new Beast();
        }


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