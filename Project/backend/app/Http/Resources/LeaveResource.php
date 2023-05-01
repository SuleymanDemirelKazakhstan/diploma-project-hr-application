<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'leave_type' => new LeaveTypeResource($this->whenLoaded('leaveType')),
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'leave_reason' => $this->leave_reason,
            'employee' => new EmployeeResource($this->whenLoaded('employee')),
        ];
    }
}
