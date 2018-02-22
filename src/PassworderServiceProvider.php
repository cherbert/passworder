<?php

namespace CurioLabs\Passworder;

use Illuminate\Support\ServiceProvider;

class PassworderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/Config/passworder.php' => config_path('passworder.php'),
        ], 'config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        # Load config
        $this->mergeConfigFrom( __DIR__ . '/Config/passworder.php', 'passworder' );

        $this->app->singleton('passworder', function ($app) {
            $return = $app->make('CurioLabs\Passworder\Passworder');
            return $return;
        });
        
    }
}
