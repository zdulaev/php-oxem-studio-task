<?php 

namespace App\Core\Controllers;

/**
 * Animal class
 */
class Animal 
{
    public $id;
    public $type;
    public $range;
    public $amount = null;
    private static $auto_increment = 0;

    function __construct() {
        $this->id = self::$auto_increment++;
        $this->type = static::class;
        $this->range = [1, 1];
    }

    public static function getType() {
        return substr(strrchr(static::class, "\\"), 1);
    }
}

