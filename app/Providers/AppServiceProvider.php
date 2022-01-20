<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);

        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->role == $role;
        });

//        Paginator::useBootstrap();
        if (config('app.enabled_setting')){


            if (Schema::hasTable("setting")){
                $settings = Setting::all();
                if (count($settings)){
                    $configSetting =$settings
                        ->keyBy('setting_key') // key every setting by its name
                        ->transform(function ($setting) {
                            return [
                                'name' => $setting->setting_name,
                                'value' => $setting->setting_value,
                            ]; // return only the value
                        })
                        ->toArray();
                    config(['setting' => $configSetting]);
                }
            }
        }
    }
}
