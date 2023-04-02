<?php

namespace App\Repositories;

use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Models\Employee;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function getAll()
    {
        return AttendanceResource::collection(Attendance::with('employee')->get());
    }

    public function create(array $attributes)
    {
        return Attendance::create($attributes);
    }

    public function update(Attendance $attendance, array $attributes)
    {
        $attendance->update($attributes);

        return new AttendanceResource($attendance);
    }

    public function delete(Attendance $attendance)
    {
        $attendance->delete();

        return null;
    }

    public function getEmployeeAttendance(Employee $employee)
    {
        return $employee->attendance()->get();
    }
}
