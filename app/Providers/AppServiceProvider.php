<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Experiment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Quick fix because of artisan
        if (!\App::runningInConsole()) {
            // Header Counters
            $liveExperiments        = Experiment::where('archived', '=', false)->count();
            $archivedExperiments    = Experiment::where('archived', '=', true)->count();

            View::share('liveExperiments', $liveExperiments);
            View::share('archivedExperiments', $archivedExperiments);
        }
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
