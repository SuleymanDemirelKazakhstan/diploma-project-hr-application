<?php

namespace App\Providers;

use App\Repositories\AttendanceRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\HolidayRepository;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\HolidayRepositoryInterface;
use App\Repositories\Interfaces\LeaveRepositoryInterface;
use App\Repositories\LeaveRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(HolidayRepositoryInterface::class, HolidayRepository::class);
        $this->app->bind(LeaveRepositoryInterface::class, LeaveRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
