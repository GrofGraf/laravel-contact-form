<?php

namespace GrofGraf\LaravelContactForm\Providers;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      include __DIR__.'/../routes/contact.php';

      $this->publishes([__DIR__ . '/../views' => base_path('resources/views/contact')], 'views');
      $this->publishes([__DIR__ . '/../config' => config_path()], 'config');
      $this->publishes([__DIR__ . '/../routes' => base_path('routes')], 'routes');
      $this->publishes([__DIR__ . '/../Mail' => base_path('Mail')], 'mail');
      $this->publishes([__DIR__ . '/../Controllers' => base_path('app\Http\Controllers')], 'controllers');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->mergeConfigFrom(__DIR__ . '/../config/contact.php', 'contact');
      $this->app->make('GrofGraf\LaravelContactForm\Controllers\ContactController');
      $this->loadViewsFrom(__DIR__.'/../views', 'contact');
    }
}
