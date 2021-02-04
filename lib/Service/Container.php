<?php

namespace Service;


use Model\Beast;
use Model\Combatant;
use Model\Hero;

class Container
{
    /** @var StatsStorage */
    private $heroStatsStorage;

    /** @var StatsStorage */
    private $beastStatsStorage;

    /** @var BattleManager */
    private $battleManager;

    public function generateCombatant($storage): Combatant
    {
        $statsLoader = new StatsLoader($storage);

        return $statsLoader->createCombatant();
    }

    public function getHeroStatsStorage(): StatsStorage
    {
        if ($this->heroStatsStorage === null) {
            $this->heroStatsStorage = new StatsStorage(Hero::getName());
        }

        return $this->heroStatsStorage;
    }

    public function getBeastStatsStorage(): StatsStorage
    {
        if ($this->beastStatsStorage === null) {
            $this->beastStatsStorage = new StatsStorage(Beast::getName());
        }

        return $this->beastStatsStorage;
    }

    public function getBattleManager()
    {
        if ($this->battleManager === null) {
            $this->battleManager = new BattleManager();
        }

        return $this->battleManager;
    }

    /**
     * @return Combatant[]
     */
    public function prepareCombatants()
    {
        // create Hero
        $heroJson = $this->getHeroStatsStorage();
        $hero = $this->generateCombatant($heroJson);



        // create Beast
        $beastJson = $this->getBeastStatsStorage();
        $beast = $this->generateCombatant($beastJson);

        return ['hero' => $hero, 'beast' => $beast];
    }
}