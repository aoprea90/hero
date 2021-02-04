<?php

namespace Model;

abstract class MagicSkills
{
    private const MAGIC_METHODS = ['rapidStrike', 'magicShield'];

    private $rapidStrike = false;

    private $magicShield = false;

    public static function getMagicMethods()
    {
        return self::MAGIC_METHODS;
    }

    /**
     * @return mixed
     */
    public function getRapidStrike()
    {
        return $this->rapidStrike;
    }

    /**
     * @param $rapidStrike
     * @return $this
     */
    public function setRapidStrike($rapidStrike)
    {
        $isUsingMagicMethod = $this->chance($rapidStrike);
        $this->rapidStrike = $isUsingMagicMethod;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMagicShield()
    {
        return $this->magicShield;
    }

    /**
     * @param $magicShield
     * @return $this
     */
    public function setMagicShield($magicShield)
    {
        $isUsingMagicMethod = $this->chance($magicShield);
        $this->magicShield = $isUsingMagicMethod;
        return $this;
    }

    public function chance($percent)
    {
        $randomLuck =  mt_rand(0, $this->getLuck());

        if ($randomLuck < $percent && $randomLuck > rand(0, 99)) {
            return true;
        }
        return false;
    }
}