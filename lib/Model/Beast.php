<?php

namespace Model;


class Beast implements Combatant
{
    use CommonStats;

    private const NAME = 'beast';

    public function hasMagicMethods()
    {
        return false;
    }

    public static function getName():string
    {
        return self::NAME;
    }

    public static function getMagicMethods()
    {
        return [];
    }
}