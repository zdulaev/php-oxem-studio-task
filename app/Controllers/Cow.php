<?php 

namespace App\Controllers;

use App\Core\Controllers\Animal;

/**
 * class Cow
 */
class Cow extends Animal
{
    const PRODUCT = 'Milk';
    const UNIT = 'L.';

    function __construct() {
        parent::__construct();
        $this->range = [8, 12];
    }
}

