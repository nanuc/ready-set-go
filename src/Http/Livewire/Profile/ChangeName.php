<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Profile;

use Nanuc\ReadySetGo\Http\Livewire\BaseComponent;

class ChangeName extends BaseComponent
{
    public $name = '';

    public function mount()
    {
        $this->name = auth()->user()->name;
    }

    public function render()
    {
        return view('rsg::livewire.profile.change-name');
    }

    public function setName()
    {
        $this->validate([
            'name' => 'required',
        ]);

        auth()->user()->name = $this->name;
        auth()->user()->save();

        $this->notify(__('New name saved!'));
    }
}
