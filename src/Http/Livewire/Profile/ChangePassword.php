<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Profile;

use Nanuc\ReadySetGo\Http\Livewire\BaseComponent;
use Nanuc\ReadySetGo\Rules\MatchOldPassword;

class ChangePassword extends BaseComponent
{
    public $oldPassword = '';
    public $newPassword = '';
    public $newPasswordConfirmation = '';

    public function render()
    {
        return view('rsg::livewire.profile.change-password');
    }

    public function setPassword()
    {
        $this->validate([
            'oldPassword' => ['required', new MatchOldPassword()],
            'newPassword' => 'required|case_diff|numbers|letters|symbols|min:8',
            'newPasswordConfirmation' => 'required|same:newPassword',
        ]);

        auth()->user()->password = bcrypt($this->newPassword);
        auth()->user()->save();

        $this->notify(__('New password saved!'));
    }
}
