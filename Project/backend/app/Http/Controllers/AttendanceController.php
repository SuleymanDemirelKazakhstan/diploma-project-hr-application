<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Models\Employee;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{

    protected $repository;

    public function __construct(AttendanceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return \response($this->repository->getAll(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request, Employee $employee): Response
    {
        if (!$employee) {
            abort(404, 'Employee not found');
        }
        $start = new \DateTime($request->input('punch_in'));
        $end = new \DateTime($request->input('punch_out'));
        $duration = $start->diff($end);
        $totalHours = $duration->h + ($duration->days * 24);
        $normalHours = 8;
        $overtimeHours = max($totalHours - $normalHours, 0);
        $production = $duration->format('%h:%i:%s');
        return \response($this->repository->create([
            'employee_id' => $employee->id,
            'punch_in' => $request->input('punch_in'),
            'punch_out' => $request->input('punch_out'),
            'production' => $production,
            'break' => '01:00:00',
            'overtime' => $overtimeHours
        ]), Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): Response
    {
        $attendance = $this->repository->getEmployeeAttendance($employee);

        return \response(AttendanceResource::collection($attendance), Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance): Response
    {
//        return \response($this->repository->delete($attendance));
    }
}
