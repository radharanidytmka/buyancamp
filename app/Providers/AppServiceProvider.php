<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\reservasi_detail;
use App\Observers\reservasi_detailObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        reservasi_detail::observe(reservasi_detailObserver::class);
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
