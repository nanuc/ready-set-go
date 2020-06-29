<?php

namespace Nanuc\ReadySetGo\Facades;

use Illuminate\Support\Facades\Facade;

class ReadySetGo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ready-set-go';
    }
}
