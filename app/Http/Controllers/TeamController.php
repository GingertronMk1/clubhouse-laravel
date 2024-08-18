<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view(
            'team.index',
            [
                'teams' => Team::get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view(
            'team.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request): RedirectResponse
    {
        Team::create($request->all());

        return to_route('team.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team): Application|Factory|View
    {
        return view(
            'team.show',
            [
                'team' => $team,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team): Application|Factory|View
    {
        return view(
            'team.edit',
            [
                'team' => $team,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team): RedirectResponse
    {
        $team->update($request->all());

        return to_route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team): RedirectResponse
    {
        $team->delete();

        return to_route('team.index');
    }
}
