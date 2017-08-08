<?php
/**
 * Created by PhpStorm.
 * User: Emperical
*/

namespace app\models\Providers;


use yii;
use app\models\ratings\ShipsRating;
use app\models\ratings\GuildsRating;
use app\models\ratings\AvatarsRating;
use app\models\ratings\RatingTemplate;
use app\models\Helpers\cache\CacheWrap;
use app\models\Helpers\datetime\Clock;

class RatingServiceProvider
{

    /**
     * Boot rating application service
     *
     * @return array
     */
    public static function boot()
    {
        CacheWrap::getInstance()->create([AvatarsRating::class, 'avatars']);
        $avatars = CacheWrap::getInstance()->getOrSet(function () {
            $ratingTemplate = new RatingTemplate(new AvatarsRating());
            return $ratingTemplate->get();
        }, Clock::minutesToSeconds(30));

        CacheWrap::getInstance()->create([GuildsRating::class, 'guilds']);
        $guilds = CacheWrap::getInstance()->getOrSet(function () {
            $ratingTemplate = new RatingTemplate(new GuildsRating());
            return $ratingTemplate->get();
        }, Clock::minutesToSeconds(30));

        CacheWrap::getInstance()->create([ShipsRating::class, 'ships']);
        $ships = CacheWrap::getInstance()->getOrSet(function () {
            $ratingTemplate = new RatingTemplate(new ShipsRating());
            return $ratingTemplate->get();
        }, Clock::minutesToSeconds(30));


        return compact($avatars, $guilds, $ships);
    }
}