<?php

namespace Nanuc\ReadySetGo\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $type;
    public $title;
    public $confirmButtonLabel;
    public $wireAction;
    public $triggerButtonLabel;
    public $triggerLinkLabel;

    public function __construct($id = null, $type = '', $title = null, $confirmButtonLabel = null, $wireAction = null, $triggerButtonLabel = null, $triggerLinkLabel = null)
    {
        $this->type = $type;
        $this->confirmButtonLabel = $confirmButtonLabel;
        $this->wireAction = $wireAction;
        $this->triggerButtonLabel = $triggerButtonLabel;
        $this->triggerLinkLabel = $triggerLinkLabel;
        $this->title = $title ?? $this->getTitleFromTrigger();
        $this->id = $id ??Str::slug($this->title);
    }

    public function render()
    {
        return view('rsg::components.modal');
    }

    protected function getTitleFromTrigger()
    {
        if($this->triggerButtonLabel) {
            return $this->triggerButtonLabel . '?';
        }
        if($this->triggerLinkLabel) {
            return $this->triggerLinkLabel . '?';
        }

    }
}
