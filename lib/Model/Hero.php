<?php

namespace Model;

class Hero extends MagicSkills implements Combatant
{
    use CommonStats;

    private const NAME = 'hero';

    public function hasMagicMethods()
    {
        return true;
    }

    public static function getName():string
    {
        return self::NAME;
    }
}