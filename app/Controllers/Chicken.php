<?php 

namespace App\Controllers;

use App\Core\Controllers\Animal;

/**
 * class Chicken
 */
class Chicken extends Animal
{
    const PRODUCT = 'Egg';
    const UNIT = 'piece';

    function __construct() {
        parent::__construct();
        $this->range = [0, 1];
    }
}

