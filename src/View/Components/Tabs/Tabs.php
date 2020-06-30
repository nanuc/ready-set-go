<?php

namespace Nanuc\ReadySetGo\View\Components\Tabs;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Tabs extends Component
{
    public $active;
    public $tabsId;

    public function __construct($active)
    {
        $this->active = resolve('tab-info')->getTabItemId($active);
        $this->tabsId = resolve('tab-info')->getTabsId(true);
    }

    public function render()
    {
        return view('rsg::components.tabs.tabs');
    }
}
