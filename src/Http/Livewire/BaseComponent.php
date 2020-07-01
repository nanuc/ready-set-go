<?php

namespace Nanuc\ReadySetGo\Http\Livewire;

use Livewire\Component;

class BaseComponent extends Component
{
    protected function notify($message, $type = 'success')
    {
        $this->dispatchBrowserEvent('notify', [
            'type' => $type,
            'message' => $message,
        ]);
    }
}
