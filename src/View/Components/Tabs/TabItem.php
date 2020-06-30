<?php

namespace Nanuc\ReadySetGo\View\Components\Tabs;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class TabItem extends Component
{
    public $id;
    public $caption;
    public $tabsId;

    public function __construct($caption)
    {
        $this->caption = $caption;
        $this->id = resolve('tab-info')->getTabItemId($caption);
        $this->tabsId = resolve('tab-info')->getTabsId();
        resolve('tab-info')->addTabItem($caption);
    }

    public function render()
    {
        return view('rsg::components.tabs.tab-item');
    }
}
