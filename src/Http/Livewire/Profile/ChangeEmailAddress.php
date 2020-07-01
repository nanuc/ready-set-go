<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Profile;

use Nanuc\ReadySetGo\Http\Livewire\BaseComponent;

class ChangeEmailAddress extends BaseComponent
{
    public $email = '';

    public function mount()
    {
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('rsg::livewire.profile.change-email-address');
    }

    public function setEmailAddress()
    {
        $this->validate([
            'email' => 'required|unique:users',
        ]);

        auth()->user()->email = $this->email;
        auth()->user()->save();

        $this->notify(__('New email address saved!'));
    }
}
