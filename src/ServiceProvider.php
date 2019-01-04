<?php

namespace Hesunfly\LaravelWeather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/path/to/config/weather.php' => config_path('weather.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}