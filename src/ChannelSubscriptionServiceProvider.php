<?php

namespace Kirych\ChannelSubscription;

use Illuminate\Support\ServiceProvider;
use Route;

class ChannelSubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/models' => base_path('app'),
            __DIR__ . '/database/migrations' => base_path('/database/migrations'),
            __DIR__ . '/database/seeds' => base_path('/database/seeds'),
        ]);

        Route::get('subscription', 'Kirych\ChannelSubscription\ChannelSubscriptionController@form')->name('subscription.form');
        Route::post('subscription', 'Kirych\ChannelSubscription\ChannelSubscriptionController@save')->name('subscription.save');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include(base_path('/vendor/twig/twig/lib/Twig/Autoloader.php'));
    }
}
