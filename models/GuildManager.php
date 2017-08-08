<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use app\models\Helpers\Helpers;
use yii\db\ActiveRecord;

class GuildManager extends ActiveRecord
{
    /**
     * Singleton
     */
    private static $instance;

    /**
     * @return GuildManager
     */
    public static function getInstance()
    {
        return self::$instance == null ? self::$instance = new GuildManager() : self::$instance;
    }

    /**
     * Scope a query to only include authority guilds.
     *
     * @return mixed
     */
    public function scopeTopAuthority()
    {
        return Guild::find()->orderBy('authority DESC')->limit(50)->all();
    }

    /**
     * Scope a query to only include top level guilds.
     *
     * @return ActiveRecord
     */
    public function scopeTopLevel()
    {
        return Guild::find()->orderBy('unlocked_level DESC')->limit(50)->all();
    }

    /**
     * Get guild leader id
     *
     * @param $guild
     * @return string
     */
    public function getLeaderDescriptor($guild)
    {
        $member = Guild::findOne(['id' => $guild->id]);
        if($member != null)
        {
            $leaderDescriptor = Helpers::castToObject($member->leader()->one());
            return $leaderDescriptor;
        }

        return null;
    }

    /**
     * Get all guild leader's information
     *
     * @param $guild
     * @return null|string
     */
    public function getGuildLeader($guild)
    {
        $descriptor = $this->getLeaderDescriptor($guild);
        $leader = Avatar::findOne($descriptor->avatar_id);
        return $leader != null ? $leader : null;
    }

    /**
     * Get guild leader name
     *
     * @param $leader
     * @return mixed
     */
    public function getLeaderName($leader)
    {
        return $leader->name;
    }

    /**
     * Get guild (leader) faction
     *
     * @param $leader
     * @return mixed|string
     */
    public function getGuildFaction($leader)
    {
        $leaderSoul = SoulManager::getInstance()->getAvatarSoul($leader);
        $faction = AvatarManager::getInstance()->getFactionAttribute($leaderSoul);
        return $faction != null ? $faction : "Unknown";
    }

    /**
     * Return the table associated with the model.
     *
     * @return string
     */
    public static function tableName()
    {
        return Guild::tableName();
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