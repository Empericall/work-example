<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use yii\db\ActiveRecord;

class Ship extends ActiveRecord
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected static $table = 'ships';

    /**
     * A ship belongs to a avatar.
     *
     * @return mixed
     */
    public function avatar()
    {
        return $this->hasOne(Avatar::class, ['soul_id' => 'owner_soul_id']);
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