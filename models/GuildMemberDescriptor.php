<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use yii\db\ActiveRecord;

class GuildMemberDescriptor extends ActiveRecord
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected static $table = 'guild_member_descriptors';

    /**
     * A descriptor has a guild.
     */
    public function guilds()
    {
        return $this->hasOne(Guild::class, ['id' => 'guild_id']);
    }

    /**
     * Return the table associated with the model.
     * 
     * @return string
     */
    public static function tableName()
    {
        return self::$table;
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