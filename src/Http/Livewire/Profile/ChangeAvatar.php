<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Profile;

use Nanuc\ReadySetGo\Http\Livewire\BaseComponent;

class ChangeAvatar extends BaseComponent
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('rsg::livewire.profile.change-avatar');
    }
}
