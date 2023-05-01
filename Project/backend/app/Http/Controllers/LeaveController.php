<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Http\Resources\LeaveResource;
use App\Models\Employee;
use App\Models\Leave;
use App\Repositories\Interfaces\LeaveRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class LeaveController extends Controller
{

    protected $repository;

    public function __construct(LeaveRepositoryInterface $repository)
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
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequest $request, Employee $employee): Response
    {
        if (!$employee) {
            abort(404, 'Employee not found');
        }
        return \response(new LeaveResource($this->repository->create([
            'leave_type_id' => $request->input('leave_type_id'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'leave_reason' => $request->input('leave_reason'),
            'employee_id' => $employee->id,
        ])), Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request, Leave $leave): Response
    {
        return \response($this->repository->update($leave->id, $request->all()), Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave): Response
    {
        return \response($this->repository->delete($leave->id), Response::HTTP_NO_CONTENT);
    }

    public function employeeLeaves(Employee $employee): Response
    {
        return \response($this->repository->getEmployeeLeaves($employee));
    }
}
