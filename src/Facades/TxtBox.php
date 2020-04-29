<?php

namespace Woenel\TxtBox\Facades;

use Illuminate\Support\Facades\Facade;

class TxtBox extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'TxtBox';
    }
}