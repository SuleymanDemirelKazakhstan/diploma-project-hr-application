<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return \response(PositionResource::collection(Position::all()), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position): Response
    {
        return \response(new PositionResource($position), Response::HTTP_OK);
    }

}
