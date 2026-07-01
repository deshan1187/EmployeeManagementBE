<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\EmployeeManagement\app\Repositories\EmployeeInterface;
use Modules\EmployeeManagement\app\Repositories\EmployeeImplementation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeInterface::class,EmployeeImplementation::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
