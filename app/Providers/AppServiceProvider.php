<?php

namespace App\Providers;

use App\Models\Staff;
use App\Models\Workorder;
use App\Models\WorkTechnician;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $staff = Staff::all();
            $view->with('staff', $staff);
        });


    }
}
