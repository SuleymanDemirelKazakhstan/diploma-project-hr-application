<?php

namespace App\Repositories\Interfaces;

interface HolidayRepositoryInterface
{
    public function getAll();

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}
