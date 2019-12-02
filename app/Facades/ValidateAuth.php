<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ValidateAuth extends Facade {
    protected static function getFacadeAccessor() {
        return 'validateauth'; 
    }
}