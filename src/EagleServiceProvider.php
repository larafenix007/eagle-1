<?php

namespace LaraFenix007\Eagle;

use Illuminate\Support\ServiceProvider;

class EagleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            $this->defaultConfig() => config_path('eagle.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->setupConfiguration();

        $this->app->singleton(Client::class, function () {
            $options = config('eagle');

            // Register the client using the key and options from config
            $token = new ApiToken(config('eagle.api_key'));

            return new Client($token, $options);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['eagle'];
    }

    /**
     * Setup configuration
     *
     * @return  void
     */
    private function setupConfiguration()
    {
        $config = $this->defaultConfig();
        $this->mergeConfigFrom($config, 'eagle');
    }

    /**
     * Returns the default configuration path
     *
     * @return string
     */
    private function defaultConfig()
    {
        return __DIR__ . '/config/eagle.php';
    }
}
