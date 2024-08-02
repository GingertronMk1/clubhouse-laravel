<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Models\Sport;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|Responsable
    {
        return $this->inertia('Sport/Index', ['sports' => Sport::with('positions')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|Responsable
    {
        return $this->inertia('Sport/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRequest $request): Response|Responsable
    {
        Sport::create($request->validated());

        return to_route('sport.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport): Response|Responsable
    {
        return $this->inertia('Sport/Show', ['sport' => $sport]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport): Response|Responsable
    {
        return $this->inertia('Sport/Edit', ['sport' => $sport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportRequest $request, Sport $sport): Response|Responsable
    {
        $sport->update($request->validated());

        return to_route('sport.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport): Response|Responsable
    {
        $sport->delete();

        return to_route('sport.index');
    }
}
