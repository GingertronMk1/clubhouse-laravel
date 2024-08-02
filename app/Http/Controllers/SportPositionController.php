<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use App\Models\Sport;
use Illuminate\Contracts\Support\Responsable;
use Inertia\Response;

class SportPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sport $sport): Response|Responsable
    {
        return $this->inertia(
            'Position/Index',
            [
                'sport' => $sport->load('positions'),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sport $sport): Response|Responsable
    {
        return $this->inertia(
            'Position/Create',
            [
                'sport' => $sport->load('positions'),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request, Sport $sport): Response|Responsable
    {
        $sport->positions()->create($request->validated());

        return to_route('sport.position.index', ['sport' => $sport]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport, Position $position): Response|Responsable
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport, Position $position): Response|Responsable
    {
        return $this->inertia('Position/Edit', [
            'position' => $position,
            'sport' => $sport->load('positions'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Sport $sport, Position $position): Response|Responsable
    {
        $position->update($request->validated());

        return to_route('sport.position.index', ['sport' => $sport]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport, Position $position): Response|Responsable
    {
        //
    }
}
