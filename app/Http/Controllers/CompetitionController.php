<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Models\Competition;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view(
            'competition.index',
            [
                'competitions' => Competition::get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view(
            'competition.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetitionRequest $request): RedirectResponse
    {
        Competition::create($request->all());

        return to_route('competition.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition): Application|Factory|View
    {
        return view(
            'competition.show',
            [
                'competition' => $competition,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition): Application|Factory|View
    {
        return view(
            'competition.edit',
            [
                'competition' => $competition,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetitionRequest $request, Competition $competition): RedirectResponse
    {
        $competition->update($request->all());

        return to_route('competition.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition): RedirectResponse
    {
        $competition->delete();

        return to_route('competition.index');
    }
}
