<?php

namespace Laravel\FlashMessage;

use Illuminate\Support\ServiceProvider;

class FlashMessageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $viewPath = __DIR__ . '/../resources/views';
        $this->loadViewsFrom($viewPath, 'flash');

        $this->publishes([
            $viewPath => base_path('resources/views/vendor/flash')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            SessionStore::class,
            LaravelSessionStore::class
        );

        $this->app->singleton('flash', function () {
            return $this->app->make(Notifier::class);
        });
    }
}
