<?php

namespace Service;

use Model\Combatant;

class BattleManager
{
    /** @var Combatant */
    private $attacker;

    /** @var Combatant */
    private $defender;

    private $doubleStrike = false;

    public static $battleNumber = 10;

    public $changedPosition = false;

    public $count = 0;


    public function battle()
    {
        $damage = $this->getDamage();

        if ($this->defender->getMagicShield()) {
            $damage = ceil($damage / 2);
        }

        if ($this->defender->isLucky()) {
            $damage = 0;
        }

        $this->count++;
        $this->defender->setDamagedHealth($this->defender->getHealth() - $damage);


        $this->defender->setDamagedHealth($this->defender->getHealth() - $damage);

        if ($this->defender->getHealth() <= 0) {
            $battleResult = new BattleResult($this->attacker, $this->defender);
            $battleResult->showResult();

            return true;
        }


        if ($this->attacker->getRapidStrike() && $this->doubleStrike === false) {
            $this->doubleStrike = true;
            self::battle();

        } else if (!$this->changedPosition) {
            $this->exchangePositions($this->defender, $this->attacker);
            self::battle();
        } else if ($this->changedPosition) {
            $this->changedPosition = false;
            $this->doubleStrike = false;
            return false;
        }
    }

    public function setEngagingOrder(Combatant $red, Combatant $blue): void
    {
        $response = strnatcmp($red->getSpeed(), $blue->getSpeed());

        switch ($response) {
            case -1:
                $this->attacker = $blue;
                $this->defender = $red;
            break;

            case 1:
                $this->attacker = $red;
                $this->defender = $blue;
            break;

            case 0:
                $this->attacker = $blue;
                $this->defender = $red;

                if ($red->getLuck() > $blue->getLuck()) {
                    $this->attacker = $red;
                    $this->defender = $blue;
                }
            break;
        }
    }

    public function getDamage()
    {
        return $this->attacker->getStrength() - $this->defender->getDefence();
    }

    public function exchangePositions(Combatant $atacker, Combatant $defender): void
    {
        $this->attacker = $atacker;
        $this->defender = $defender;
        $this->changedPosition = true;
    }

    /**
     * @return Combatant
     */
    public function getAttacker(): Combatant
    {
        return $this->attacker;
    }

    /**
     * @param Combatant $attacker
     * @return BattleManager
     */
    public function setAtacker(Combatant $attacker): BattleManager
    {
        $this->attacker = $attacker;
        return $this;
    }

    /**
     * @return Combatant
     */
    public function getDefender(): Combatant
    {
        return $this->defender;
    }

    /**
     * @param Combatant $defender
     * @return BattleManager
     */
    public function setDefender(Combatant $defender): BattleManager
    {
        $this->defender = $defender;
        return $this;
    }
}