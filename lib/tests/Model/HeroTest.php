<?php

namespace tests\Model;

use Model\Hero;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    public function testStrength()
    {
        $hero = new Hero();

        //$this->assertSame(['min' => 0, 'max' => 0], $hero->getStrength());

        $hero->setStrength(['min' => 10, 'max' => 50]);

        //$hero->getStrength();

        echo $hero->getStrength();

       // $this->assertSame(['min' => 10, 'max' => 50], $hero->getStrength());

    }
}