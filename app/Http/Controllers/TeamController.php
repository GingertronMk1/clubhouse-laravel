<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|Responsable
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|Responsable
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request): Response|Responsable
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team): Response|Responsable
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team): Response|Responsable
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team): Response|Responsable
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team): Response|Responsable
    {
        //
    }
}
