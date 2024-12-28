<?php

namespace App\Providers;
use App\Models\Cart;
use App\Observers\CartObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cart::observe(CartObserver::class);
    }
}
