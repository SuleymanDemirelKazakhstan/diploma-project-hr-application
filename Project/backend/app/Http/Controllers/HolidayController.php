<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Http\Resources\HolidayResource;
use App\Models\Holiday;
use App\Repositories\HolidayRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class HolidayController extends Controller
{
    protected $repository;

    public function __construct(HolidayRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return \response($this->repository->getAll(), Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHolidayRequest $request)
    {
        return \response(new HolidayResource($this->repository->create($request->all())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Holiday $holiday): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHolidayRequest $request, Holiday $holiday): Response
    {
        return \response($this->repository->update($holiday->id, $request->all()), Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holiday $holiday): Response
    {
        return \response($this->repository->delete($holiday->id), Response::HTTP_NO_CONTENT);
    }
}
