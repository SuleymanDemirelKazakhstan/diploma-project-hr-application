<?php

namespace App\Repositories\Interfaces;

use App\Models\Attendance;
use App\Models\Employee;

interface AttendanceRepositoryInterface
{
    public function getAll();

    public function create(array $attributes);

    public function update(Attendance $attendance, array $attributes);

    public function getEmployeeAttendance(Employee $employee);

    public function delete(Attendance $attendance);
}
