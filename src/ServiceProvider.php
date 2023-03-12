<?php

namespace Flashy;

use App\Exceptions\Handler as BaseExceptionHandler;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
          __DIR__.'/../config/flashy.php', 'flashy'
        );
        app()->bind(
            BaseExceptionHandler::class,
            ExceptionHandler::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
          __DIR__.'/../config/flashy.php' => config_path('flashy.php'),
        ]);
    }
}
