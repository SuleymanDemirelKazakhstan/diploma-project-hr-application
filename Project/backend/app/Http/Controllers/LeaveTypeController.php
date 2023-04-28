<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeaveTypeResource;
use App\Models\LeaveType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return \response(LeaveTypeResource::collection(LeaveType::all()));
    }


    /**
     * Display the specified resource.
     */
    public function show(LeaveType $leaveType): Response
    {
        //
    }
}
