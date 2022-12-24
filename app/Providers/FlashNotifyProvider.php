<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FlashNotifyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Spatie\Flash\Flash::levels([
            'success' => 'alert alert-success alert-dismissible fade show mb-2 mt-2',
            'warning' => 'alert alert-dismissible fade show alert-warning mb-2 mt-2',
            'error' => 'alert alert-dismissible fade show alert-error mb-2 mt-2',
        ]);
    }
}
