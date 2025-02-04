<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords;

use Livewire\Component;

class Confirm extends Component
{
    /** @var string */
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('rsg::livewire.auth.passwords.confirm');
    }
}
