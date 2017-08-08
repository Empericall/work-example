<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models;

use app\models\Helpers\Helpers;
use yii\db\ActiveRecord;

class Avatar extends ActiveRecord
{
    /**
     * The avatar name
     *
     * @var string
     */
    private $name;

    /**
     * The avatar faction membership
     *
     * @var string
     */
    private $faction;

    /**
     * The avatar guild membership
     *
     * @var string
     */
    private $guild;

    /**
     * The avatar class
     *
     * @var string
     */
    private $class;

    /**
     * The avatar equipment score
     *
     * @var integer
     */
    private $gearScore;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected static $table = 'avatar';

    /**
     * The classes avatar's
     *
     * @var array
     */
    protected static $classes = [
        411435055 => 'Kanian Druid',
        411435110 => 'Kanian Mage',
        411435057 => 'Kanian Paladin',
        411435053 => 'Kanian Healer',
        411435087 => 'Kanian Scout',
        411435013 => 'Kanian Warrior',
        274401332 => 'Kanian Bard',
        411435047 => 'Elf Mage',
        411435008 => 'Elf Summoner',
        411435018 => 'Elf Paladin',
        411435043 => 'Elf Healer',
        237546519 => 'Elf Psy',
        274401320 => 'Elf Bard',
        411435071 => 'Gibberling Druid',
        411435040 => 'Gibberling Psy',
        411435042 => 'Gibberling Scout',
        411435089 => 'Gibberling Warrior',
        237546511 => 'Xadagan Mage',
        411435021 => 'Xadagan Summoner',
        411435030 => 'Xadagan Paladin',
        411435028 => 'Xadagan Healer',
        411435050 => 'Xadagan Psy',
        411435051 => 'Xadagan Scout',
        411435099 => 'Xadagan Warrior',
        274401304 => 'Xadagan Bard',
        411435054 => 'Orc Druid',
        411435056 => 'Orc Paladin',
        411435088 => 'Orc Scout',
        411435014 => 'Orc Warrior',
        274401331 => 'Orc Bard',
        411435016 => 'Arizen Mage',
        411435032 => 'Arizen Summoner',
        411435011 => 'Arizen Healer',
        411435067 => 'Arizen Psy',
    ];

    /**
     * The available sex
     * 
     * @var array
     */
    protected static $availableSex = [
        58942 => 'Male',
        58943 => 'Female',
    ];

    /**
     * @return array
     */
    public static function getClasses()
    {
        return self::$classes;
    }

    /**
     * @return array
     */
    public static function getAvailableSex()
    {
        return self::$availableSex;
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