<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Children;
use App\Models\EmployeeDegree;
use App\Models\Position;
use App\Models\SocialStatus;
use App\Models\Title;
use App\Models\Transportation;
use App\Models\UniversityService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
//        View::share('certificates', Certificate::all());
//        View::share('positions', Position::all());
//        View::share('employeeDegrees', EmployeeDegree::all());
//        View::share('children', Children::all());
//        View::share('socialStatus', SocialStatus::all());
//        View::share('titles', Title::all());
//        View::share('transportations', Transportation::all());
//        View::share('universityServices', UniversityService::all());
    }
}
