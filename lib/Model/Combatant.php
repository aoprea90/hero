<?php

namespace Model;

interface Combatant
{
    public static function getName();

    public function hasMagicMethods();

    public function getRapidStrike();

    public function getMagicShield();

    public static function getMagicMethods();

    public function setDamagedHealth($damage);

    public function getHealth();

    public function getLuck();

    public function getStrength();

    public function getDefence();

    public function getSpeed();

    public function isLucky();
}