<?php

namespace App\Providers;

use App\Http\Middleware\LocaleMiddleware;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        // When debugging a query only from the database
        if (config('app.debug') === true) {
            LocaleMiddleware::setCache(Language::active()->get());
        } else {

            // Save in file cache
            Cache::rememberForever('languages', function () {
                return Language::active()->get();
            });
            LocaleMiddleware::setCache(Cache::get('languages'));
        }
    }
}
