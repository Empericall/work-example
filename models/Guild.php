<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use yii\db\ActiveRecord;

class Guild extends ActiveRecord
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected static $table = 'guild';

    /**
     * A guild belongs to a leader.
     *
     * @return mixed
     */
    public function leader()
    {
        return $this->hasOne(GuildMemberDescriptor::class, ['guild_id' => 'id'])
            ->where(['rank_res_id' => 408682500]);
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