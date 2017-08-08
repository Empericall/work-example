<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models\ratings;


use app\models\ShipsManager;
use app\models\Helpers\Helpers;

class ShipsRating implements RatingInterface
{

    public function get()
    {
        $shipsTop = ShipsManager::getInstance()->scopeTopGear();
        $localIterator = 0;

        foreach ($shipsTop as $ship)
        {
            $owners[] = ShipsManager::getInstance()->getShipOwner($ship);

            $factions[] = ShipsManager::getInstance()->getOwnerFaction($owners[$localIterator]);

            $localIterator++;
        }

        return Helpers::castToObject(compact("shipsTop", "owners", "factions"));
    }
}