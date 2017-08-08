<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;


use yii\db\ActiveRecord;

class Soul extends ActiveRecord
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected static $table = 'soul';

    /**
     * The known factions
     *
     * @var array
     */
    protected static $factions = [
        41238 => 'League',
        41240 => 'Empire',
    ];

    /**
     * Get the known factions
     *
     * @return array
     */
    public static function getFactions()
    {
        return self::$factions;
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