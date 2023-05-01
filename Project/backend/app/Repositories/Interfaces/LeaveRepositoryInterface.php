<?php

namespace App\Repositories\Interfaces;

interface LeaveRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function update($id, array $attributes);

    public function delete($id);

    public function create(array $attributes);

    public function getEmployeeLeaves($employee);
}
