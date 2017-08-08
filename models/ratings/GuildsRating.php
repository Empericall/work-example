<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models\ratings;


use app\models\GuildManager;
use app\models\Helpers\Helpers;

class GuildsRating implements RatingInterface
{

    public function get()
    {
        $guildsTop = GuildManager::getInstance()->scopeTopAuthority();
        $localIterator = 0;

        foreach ($guildsTop as $guild)
        {
            $leaders[] = GuildManager::getInstance()->getGuildLeader($guild);

            $guildsFaction[] = GuildManager::getInstance()->getGuildFaction($leaders[$localIterator]);

            $localIterator++;
        }

        return Helpers::castToObject(compact("guildsTop", "leaders", "guildsFaction"));
    }
}