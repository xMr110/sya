<?php

namespace App\Providers;

use App\Models\Background;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Certificate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function($view) {

            if (! Cache::has('site_settings')) {
                $settings = Cache::rememberForever('site_settings', function () {
                    $settings = Setting::rows();
                    return $settings;
                });
            } else {
                $settings = Cache::get('site_settings');
            }

            $certificates = Certificate::all();
            
            return [
                $view->with(compact('settings' , 'certificates')),
            ];
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
