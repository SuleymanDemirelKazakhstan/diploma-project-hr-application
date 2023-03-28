<?php

namespace App\Repositories;

use App\Http\Resources\DepartmentResource;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    public function getAll()
    {
        return DepartmentResource::collection(Department::all());
    }

    public function getById($id)
    {
        return new DepartmentResource(Department::findOrFail($id));
    }

    public function create(array $attributes)
    {
        return Department::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $department = $this->getById($id);

        $department->update($attributes);

        return new DepartmentResource($department);
    }

    public function delete($id)
    {
        $department = $this->getById($id);

        $department->delete();

        return $department;
    }
}
