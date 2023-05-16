<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use JeffGreco13\FilamentBreezy\FilamentBreezy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // password rules for registration user
        FilamentBreezy::setPasswordRules(
            [
                Password::min(3)
//                    ->letters()
//                    ->numbers()
//                    ->mixedCase()
//                    ->uncompromised(3)
            ]
        );
    }
}
