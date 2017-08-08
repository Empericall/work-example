<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use yii\db\ActiveRecord;

class SoulManager extends ActiveRecord
{
    /**
     * Singleton
     */
    private static $instance;

    /**
     * @return SoulManager
     */
    public static function getInstance()
    {
        return self::$instance == null ? self::$instance = new SoulManager() : self::$instance;
    }

    /**
     * Return all soul properties
     *
     * @param $avatar
     * @return null|static
     */
    public function getAvatarSoul($avatar)
    {
        $soul = Soul::findOne(['id' => $avatar->soul_id]);
        return $soul;
    }

    /**
     * Return the table associated with the model.
     *
     * @return string
     */
    public static function tableName()
    {
        return Soul::tableName();
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