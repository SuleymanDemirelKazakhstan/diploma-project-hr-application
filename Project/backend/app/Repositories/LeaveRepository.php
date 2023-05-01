<?php

namespace App\Repositories;

use App\Http\Resources\LeaveResource;
use App\Models\Leave;
use App\Repositories\Interfaces\LeaveRepositoryInterface;

class LeaveRepository implements LeaveRepositoryInterface
{

    public function getAll()
    {
        return LeaveResource::collection(Leave::with('leaveType', 'employee')->get());
    }

    public function getById($id)
    {
        return new LeaveResource(Leave::findOrFail($id));
    }

    public function update($id, array $attributes)
    {
        $leaves = $this->getById($id);

        $leaves->update($attributes);

        return new LeaveResource($leaves);
    }

    public function delete($id)
    {
        $leaves = $this->getById($id);

        $leaves->delete();

        return null;
    }

    public function create(array $attributes)
    {
        return Leave::create($attributes);
    }

    public function getEmployeeLeaves($employee)
    {
        return $employee->leaves()->get();
    }
}
