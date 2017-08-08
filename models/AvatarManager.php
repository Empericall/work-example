<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use yii\db\ActiveRecord;
use app\models\Helpers\Helpers;

class AvatarManager extends ActiveRecord
{
    /**
     * Singleton
     */
    private static $instance;

    /**
     * @return AvatarManager
     */
    public static function getInstance()
    {
        return self::$instance == null ? self::$instance = new AvatarManager() : self::$instance;
    }

    /**
     * Get the avatar's class.
     * 
     * @param $Avatar
     * @return mixed
     */
    public function getClassAttribute($Avatar)
    {
        return Helpers::array_get($Avatar->race_class_res_id, Avatar::getClasses(), "Unknown");
    }

    /**
     * Get the avatar's sex.
     * 
     * @param $Avatar
     * @return mixed
     */
    public function getSexAttribute($Avatar)
    {
        return Helpers::array_get($Avatar->sex_res_id, Avatar::getAvailableSex(), "Unknown");
    }

    /**
     * Get the soul's faction name.
     * 
     * @param $Soul
     * @return mixed
     */
    public function getFactionAttribute($Soul)
    {
        return Helpers::array_get($Soul->faction_res_id, Soul::getFactions(), "Unknown");
    }
    
    /**
     * Get the avatar's guild descriptor.
     * 
     * @param $avatar
     * @return array|null|ActiveRecord
     */
    public function getAvatarGuild($avatar)
    {
        $descriptor = GuildMemberDescriptor::findOne(['avatar_id' => $avatar->id]);
        return $descriptor != null ? $descriptor->guilds()->one() : null;
    }

    /**
     * Get the sorted by gear score list of avatars
     * 
     * @return mixed
     */
    public function scopeTopEquip()
    {
        return Avatar::find()->orderBy('gear_score DESC')->limit(50)->all();
    }

    /**
     * Return the table associated with the model.
     * 
     * @return string
     */
    public static function tableName()
    {
        return Avatar::tableName();
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