<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use App\Models\Department;

class DepartmentRepository implements RepositoryInterface
{

    public function getAll()
    {
        return Department::all();
    }

    public function getById($id)
    {
        return Department::findOrFail($id);
    }

    public function create(array $attributes)
    {
        return Department::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $department = $this->getById($id);

        $department->update($attributes);

        return $department;
    }

    public function delete($id)
    {
        $department = $this->getById($id);

        $department->delete();

        return $department;
    }
}
