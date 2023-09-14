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


        View::composer('*', function ($view) {
            if (auth()->check() && auth()->user()->technician) {
                $workt = WorkTechnician::query()
                    ->where('status', 0)
                    ->where('technician_id', auth()->user()->technician->id)
                    ->get();
                $view->with('workt', $workt);
            }
        });

        View::composer('*', function ($view) {
            $workorder = Workorder::query()->where("status",0)->where("workapprove_status",0)->get();
            $view->with('workorder', $workorder);
        });


    }
}
