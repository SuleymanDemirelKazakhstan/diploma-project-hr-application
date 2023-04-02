<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'employee_id' => $this->employee_id,
            'punch_in' => $this->punch_in,
            'punch_out' => $this->punch_out,
            'production' => $this->production,
            'break' => $this->break,
            'overtime' => $this->overtime,
            'employee' => new EmployeeResource($this->employee)
        ];
    }
}
