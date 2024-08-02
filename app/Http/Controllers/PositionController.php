<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use App\Models\Sport;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|Responsable
    {
        return $this->inertia('Position/Index', ['positions' => Position::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|Responsable
    {
        return $this->inertia('Position/Create', [
            'sports' => Sport::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request): Response|Responsable
    {
        Position::create($request->validated());

        return to_route('position.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position): Response|Responsable
    {
        return $this->inertia('Position/Show', ['position' => $position]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position): Response|Responsable
    {
        return $this->inertia('Position/Edit', [
            'position' => $position,
            'sports' => Sport::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position): Response|Responsable
    {
        $position->update($request->validated());

        return to_route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position): Response|Responsable
    {
        $position->delete();

        return to_route('position.index');
    }
}
