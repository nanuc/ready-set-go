<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        redirect(route('app.home'));
    }

    public function render()
    {
        return view('rsg::livewire.auth.login');
    }
}
