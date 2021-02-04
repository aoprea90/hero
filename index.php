<?php

use Service\Container;
use Service\BattleManager;

require __DIR__.'/vendor/autoload.php';

$container = new Container();

while (BattleManager::$battleNumber) {
    $combatants = $container->prepareCombatants();
    $battleManager = $container->getBattleManager();

    $battleManager->setEngagingOrder($combatants['hero'], $combatants['beast']);
    $result = $battleManager->battle();

    if ($result) break 1;

    echo "AFTER BATTLE NUMBER ".BattleManager::$battleNumber." STATS: \n";
    echo $combatants['hero']::getName()." has remain health of ".$combatants['hero']->getHealth()."\n";
    echo $combatants['beast']::getName()." has remain health of ".$combatants['beast']->getHealth()."\n";
    echo "\n";

    BattleManager::$battleNumber--;
}