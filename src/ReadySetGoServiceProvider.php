<?php

namespace Nanuc\ReadySetGo;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Nanuc\ReadySetGo\Console\Initialize;
use Nanuc\ReadySetGo\Http\Controllers\ProfileController;
use Nanuc\ReadySetGo\Http\Controllers\SubscriptionController;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Login;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords\Confirm;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords\Email;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Passwords\Reset;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Register;
use Nanuc\ReadySetGo\Http\Livewire\Auth\Verify;
use Nanuc\ReadySetGo\Http\Livewire\Profile\ChangeAvatar;
use Nanuc\ReadySetGo\Http\Livewire\Profile\ChangeEmailAddress;
use Nanuc\ReadySetGo\Http\Livewire\Profile\ChangeName;
use Nanuc\ReadySetGo\Http\Livewire\Profile\ChangePassword;
use Nanuc\ReadySetGo\Lib\TabHelper;
use Nanuc\ReadySetGo\View\Components\Layouts\App;
use Nanuc\ReadySetGo\View\Components\Layouts\LandingPage;
use Nanuc\ReadySetGo\View\Components\Logo;
use Nanuc\ReadySetGo\View\Components\Modal;
use Nanuc\ReadySetGo\View\Components\Tabs\TabItem;
use Nanuc\ReadySetGo\View\Components\Tabs\Tabs;
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

        if($this->app->runningInConsole()) {
            $this->commands([
                Initialize::class
            ]);
        }

        $this->app->singleton('tab-info', function($app){
            return new TabHelper();
        });



        $this->publishes([
            __DIR__ . '/../config/ready-set-go.php' => base_path('config/ready-set-go.php')
        ], 'config');

        $this->addRoutes();
        $this->registerLivewireComponents();
        $this->registerBladeComponents();
        $this->registerMigrations();


        Paginator::defaultView('pagination::default');
        Paginator::defaultSimpleView('pagination::simple-default');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ready-set-go.php', 'ready-set-go');
    }

    protected function registerBladeComponents()
    {
        Blade::component('wire-input', WireInput::class);
        Blade::component('tabs', Tabs::class);
        Blade::component('tab-item', TabItem::class);
        Blade::component('modal', Modal::class);
    }

    protected function registerMigrations()
    {
        $migrations = [
            'create_password_resets_table',
            'create_subscription_tables',
        ];

        $publishedMigrations = collect(File::allFiles(database_path('migrations')))
            ->map(function($file){
                return Str::replaceLast('.php', '', substr($file->getFilename(), 18));
            })
            ->toArray();

        foreach($migrations as $migration) {
            if(!in_array($migration, $publishedMigrations)) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/' . $migration . '.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migration . '.php')
                ], 'migrations');
            }
        }
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('auth.login', Login::class);
        Livewire::component('auth.register', Register::class);
        Livewire::component('auth.verify', Verify::class);
        Livewire::component('auth.passwords.confirm', Confirm::class);
        Livewire::component('auth.passwords.email', Email::class);
        Livewire::component('auth.passwords.reset', Reset::class);

        Livewire::component('profile.change-avatar', ChangeAvatar::class);
        Livewire::component('profile.change-email-address', ChangeEmailAddress::class);
        Livewire::component('profile.change-name', ChangeName::class);
        Livewire::component('profile.change-password', ChangePassword::class);
    }

    protected function addRoutes()
    {
        Route::middleware('web')->group(function () {

            Route::view('/', 'landing-page.home')->name('home');

            Route::middleware(['auth', 'verified'])->group(function () {
                Route::view(config('ready-set-go.app.route'), 'app.home')->name('app.home');

                Route::get('/profile', [ProfileController::class, 'show']);
                Route::post('/profile/avatar', [ProfileController::class, 'saveAvatar']);
                Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar']);

                if(config('ready-set-go.subscription.activated')) {
                    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
                }
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