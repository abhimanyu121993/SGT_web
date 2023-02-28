<?php

namespace App\Providers;

use App\Helpers\Helper;
use Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Facades\Agent;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', Request::ip())
            ->put('os',Agent::platform())
            ->put('browser',Agent::browser())
            ->put('version',Agent::version(Agent::browser()));
            
        });
    }
}
