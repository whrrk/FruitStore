<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiSet extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'apiset';
    }
}