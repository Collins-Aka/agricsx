<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Model::unguard();
        Date::useClass(CarbonImmutable::class);
        Model::shouldBeStrict(!$this->app->isProduction());
        DB::prohibitDestructiveCommands($this->app->isProduction());//Prevent destructive command in production
        Passport::hashClientSecrets();//hashing user sensitive data e.g passwords
        Passport::tokensExpireIn(now()->addDays(15));//This sets the expiration time for access tokens to 15 days.
        Passport::refreshTokensExpireIn(now()->addDays(30));//This sets the expiration time for refresh tokens to 30 days.
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));//This sets the expiration time for personal access tokens to 6 months.
    }
}
