<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use app\models\Helpers\Helpers;
use yii\db\ActiveRecord;

class ShipsManager extends ActiveRecord
{
    /**
     * Singleton
     */
    private static $instance;

    /**
     * @return ShipsManager
     */
    public static function getInstance()
    {
        return self::$instance == null ? self::$instance = new ShipsManager() : self::$instance;
    }

    /**
     * Scope a query to sorted ships by gear_score.
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public function scopeTopGear()
    {
        return Ship::find()->orderBy('gear_score DESC')->limit(50)->all();
    }

    /**
     * Get all ship's owner information
     *
     * @param $ship
     * @return null|object
     */
    public function getShipOwner($ship)
    {
        $owner = Ship::findOne(['id' => $ship->id]);
        if($owner != null)
        {
            $info = Helpers::castToObject($owner->avatar()->one());
            return $info;
        }

        return null;
    }


    /**
     * Get owner's faction
     *
     * @param $owner
     * @return mixed
     */
    public function getOwnerFaction($owner)
    {
        $ownerSoul = SoulManager::getInstance()->getAvatarSoul($owner);
        $ownerFaction = AvatarManager::getInstance()->getFactionAttribute($ownerSoul);
        return $ownerFaction != null ? $ownerFaction : "Unknown";
    }

    /**
     * Return the table associated with the model.
     *
     * @return string
     */
    public static function tableName()
    {
        return Ship::tableName();
    }

    /**
     * Return the database name for connection.
     *
     * @return array
     */
    public static function getDb()
    {
        return \Yii::$app->avatars_db;
    }
}