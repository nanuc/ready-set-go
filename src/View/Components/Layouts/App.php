<?php

namespace Nanuc\ReadySetGo\View\Components\Layouts;

use Illuminate\View\Component;

class App extends Component
{
    public $title;

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('rsg::components.layouts.app.templates.' . config('ready-set-go.app.template') . '.layout');
    }
}
