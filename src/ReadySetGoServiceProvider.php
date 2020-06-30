<?php

namespace Nanuc\ReadySetGo;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Nanuc\ReadySetGo\Console\Initialize;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Login;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords\Confirm;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords\Email;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords\Reset;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Register;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Verify;
use Nanuc\ReadySetGo\View\Components\Layouts\App;
use Nanuc\ReadySetGo\View\Components\Layouts\LandingPage;
use Nanuc\ReadySetGo\View\Components\Logo;
use Nanuc\ReadySetGo\View\Components\WireInput;

class ReadySetGoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rsg');

        $this->loadViewComponentsAs('rsg', [
            Logo::class,
            LandingPage::class,
            App::class,
        ]);

        Blade::component('wire-input', WireInput::class);

        if($this->app->runningInConsole()) {
            $this->commands([
                Initialize::class
            ]);
        }

        if(!class_exists('CreatePasswordResetsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_password_resets_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_password_resets_table.php')
            ], 'migrations');
        }

        $this->publishes([
            __DIR__ . '/../config/ready-set-go.php' => base_path('config/ready-set-go.php')
        ], 'config');

        $this->addRoutes();

        Livewire::component('auth.login', Login::class);
        Livewire::component('auth.register', Register::class);
        Livewire::component('auth.verify', Verify::class);
        Livewire::component('auth.passwords.confirm', Confirm::class);
        Livewire::component('auth.passwords.email', Email::class);
        Livewire::component('auth.passwords.reset', Reset::class);

        Paginator::defaultView('pagination::default');
        Paginator::defaultSimpleView('pagination::simple-default');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ready-set-go.php', 'ready-set-go');
    }

    protected function addRoutes()
    {
        Route::middleware('web')->group(function () {

            Route::view('/', 'landing-page.home')->name('home');

            Route::middleware(['auth', 'verified'])->group(function () {
                Route::view(config('ready-set-go.app.route'), 'app.home')->name('app.home');
            });

            Route::layout('rsg::layouts.auth')->group(function () {
                Route::middleware('guest')->group(function () {
                    Route::livewire('login', 'auth.login')
                        ->name('login');

                    Route::livewire('register', 'auth.register')
                        ->name('register');
                });

                Route::livewire('password/reset', 'auth.passwords.email')
                    ->name('password.request');

                Route::livewire('password/reset/{token}', 'auth.passwords.reset')
                    ->name('password.reset');

                Route::middleware('auth')->group(function () {
                    Route::livewire('email/verify', 'auth.verify')
                        ->middleware('throttle:6,1')
                        ->name('verification.notice');

                    Route::livewire('password/confirm', 'auth.passwords.confirm')
                        ->name('password.confirm');
                });
            });

            Route::middleware('auth')->group(function () {
                Route::get('email/verify/{id}/{hash}', 'Nanuc\ReadySetGo\Http\Controllers\Auth\EmailVerificationController')
                    ->middleware('signed')
                    ->name('verification.verify');

                Route::post('logout', 'Nanuc\ReadySetGo\Http\Controllers\Auth\LogoutController')
                    ->name('logout');
            });
        });
    }
}