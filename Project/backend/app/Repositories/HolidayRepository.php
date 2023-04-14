<?php

namespace App\Repositories;

use App\Http\Resources\HolidayResource;
use App\Models\Holiday;
use App\Repositories\Interfaces\HolidayRepositoryInterface;

class HolidayRepository implements HolidayRepositoryInterface
{

    public function getAll()
    {
        return HolidayResource::collection(Holiday::all());
    }

    public function create(array $attributes)
    {
        return Holiday::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $holiday = Holiday::findOrFail($id);

        $holiday->update($attributes);

        return new HolidayResource($holiday);
    }

    public function delete($id)
    {
        $holiday = Holiday::findOrFail($id);

        $holiday->delete();

        return null;
    }
}
