<?php

namespace Nanuc\ReadySetGo\Lib;

use Illuminate\Support\Str;

class TabHelper
{
    protected $id;
    protected $tabItems = [];

    public function getTabsId($refresh = false)
    {
        if($refresh) {
            $this->id = 'tabs-' . Str::random(6);
            $this->tabItems = [];
        }

        return $this->id;
    }

    public function getTabItemId($caption)
    {
        return 'tab-item-' . Str::slug($caption);
    }

    public function addTabItem($caption)
    {
        $this->tabItems[] = $caption;
    }
}
