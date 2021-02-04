<?php

namespace Model;


class Beast implements Combatant
{
    private const NAME = 'beast';

    private $health;

    private $strength;

    private $defence;

    private $speed;

    private $luck;

    private $lucky;

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

    public function getRapidStrike()
    {
        return false;
    }

    public function getMagicShield()
    {
        return false;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param $health
     * @return $this
     */
    public function setHealth($health)
    {
        $randomNumber = mt_rand($health['min'], $health['max']);
        $this->health = $randomNumber;
        return $this;
    }

    public function setDamagedHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param $strength
     * @return $this
     */
    public function setStrength($strength)
    {
        $randomNumber = mt_rand($strength['min'], $strength['max']);
        $this->strength = $randomNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param $defence
     * @return $this
     */
    public function setDefence($defence)
    {
        $randomNumber = mt_rand($defence['min'], $defence['max']);
        $this->defence = $randomNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param $speed
     * @return $this
     */
    public function setSpeed($speed)
    {
        $randomNumber = mt_rand($speed['min'], $speed['max']);
        $this->speed = $randomNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param $luck
     * @return $this
     */
    public function setLuck($luck)
    {
        $randomNumber = mt_rand($luck['min'], $luck['max']);
        $this->luck = $randomNumber;
        $this->setIsLucky($randomNumber);
        return $this;
    }

    /**
     * @return mixed
     */
    public function isLucky()
    {
        return $this->lucky;
    }

    /**
     * @param $luck
     * @return $this
     */
    public function setIsLucky($luck)
    {
        $isLucky = mt_rand(0, 99) < $luck;
        $this->lucky = $isLucky;
        return $this;
    }
}