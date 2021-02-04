<?php

namespace Service;

use Model\Combatant;

class BattleResult
{
    private $winnerCombatant;

    private $loserCombatant;

    public function __construct(Combatant $winnerCombatant, Combatant $loserCombatant)
    {
        $this->winnerCombatant = $winnerCombatant;
        $this->loserCombatant = $loserCombatant;
    }

    public function showResult()
    {
        echo "WINNING COMBATANT: ".$this->winnerCombatant::getName()."\n";
    }
}