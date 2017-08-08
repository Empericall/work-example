<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models\ratings;


use app\models\SoulManager;
use app\models\AvatarManager;
use app\models\Helpers\Helpers;

class AvatarsRating implements RatingInterface
{

    public function get()
    {
        $avatarsTop = AvatarManager::getInstance()->scopeTopEquip();
        $localIterator = 0;
        
        foreach ($avatarsTop as $avatar)
        {
            $classes[] = AvatarManager::getInstance()->getClassAttribute($avatar);

            $factions[] = AvatarManager::getInstance()->getFactionAttribute(
                $Soul = SoulManager::getInstance()->getAvatarSoul($avatar)
            );

            /*
             * FIXME: получается до 50 однотипных запросов (так как максимум возможно 50 итераций), что не очень круто
             * Причина того, что это до сих пор не отрефакторено - читаемость кода в таком виде лучше.
             * К тому же, так или иначе это кэшируется, а по сему нагрузка снижается.
             * Однако НЕ рекомендуется так делать, это очень плохо.
             * */
            $descriptors[] = AvatarManager::getInstance()->getAvatarGuild($avatar);

            if($descriptors[$localIterator]->name != null) {
                $guilds[] = $descriptors[$localIterator]->name;
            }
            else {
                $guilds[] = "Нет";
            }

            $localIterator++;
        }

        return Helpers::castToObject(compact("avatarsTop", "classes", "guilds", "factions"));
    }
}