<?php

namespace App\Repositories;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{

    public function getAll()
    {
        return EmployeeResource::collection(Employee::with('user', 'position', 'department')->get());
    }

    public function getById($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }

    public function create(array $attributes)
    {
        return Employee::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $employee = $this->getById($id);

        $employee->update($attributes);

        return new EmployeeResource($employee);
    }

    public function delete($id)
    {
        $employee = $this->getById($id);

        $employee->delete();

        return null;
    }
}
