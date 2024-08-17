<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Models\Sport;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view(
            'sport.index',
            [
                'sports' => Sport::get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view(
            'sport.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRequest $request): RedirectResponse
    {
        Sport::create($request->all());

        return to_route('sport.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport): Application|Factory|View
    {
        return view(
            'sport.show',
            [
                'sport' => $sport,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport): Application|Factory|View
    {
        return view(
            'sport.edit',
            [
                'sport' => $sport,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportRequest $request, Sport $sport): RedirectResponse
    {
        $sport->update($request->all());

        return to_route('sport.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport): RedirectResponse
    {
        $sport->delete();

        return to_route('sport.index');
    }
}
