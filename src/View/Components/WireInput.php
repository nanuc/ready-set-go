<?php

namespace Nanuc\ReadySetGo\View\Components;

use Illuminate\View\Component;

class WireInput extends Component
{
    protected $type;
    public $field;
    public $caption;
    public $class;
    public $prefix;
    public $suffix;

    public function __construct($field, $caption, $class = "", $type = 'text', $prefix = null, $suffix = null)
    {
        $this->type = $type;
        $this->field = $field;
        $this->caption = $caption;
        $this->class = $class;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    public function render()
    {
        return view('rsg::components.input.' . $this->type);
    }
}
