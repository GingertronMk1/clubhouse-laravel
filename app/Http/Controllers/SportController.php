<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Models\Sport;
use Symfony\Component\HttpFoundation\Response;
use \Illuminate\Contracts\Support\Responsable;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|Responsable
    {
        return $this->inertia('Sport/Index', []);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport): Response|Responsable
    {
        return $this->inertia('Sport/Show', []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport): Response|Responsable
    {
        return $this->inertia('Sport/Edit', []);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportRequest $request, Sport $sport): Response|Responsable
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport): Response|Responsable
    {
        //
    }
}
