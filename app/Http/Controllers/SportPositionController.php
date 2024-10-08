<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use App\Models\Sport;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SportPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sport $sport): Application|Factory|View
    {
        $sport->load('positions');

        return view(
            'position.index',
            [
                'sport' => $sport,
                'positions' => $sport->positions,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sport $sport): Application|Factory|View
    {
        return view(
            'position.create',
            ['sport' => $sport->load('positions')]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request, Sport $sport): RedirectResponse
    {
        $sport->positions()->create($request->all([
            'name',
            'description',
            'preview_x',
            'preview_y',
            'sort_order',
            'default_number',
            'sport_id',
        ]));

        return to_route('sport.position.index', ['sport' => $sport]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport, Position $position): Application|Factory|View
    {
        return view(
            'position.show',
            [
                'position' => $position,
                'sport' => $sport,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport, Position $position): Application|Factory|View
    {
        return view(
            'position.edit',
            [
                'position' => $position,
                'sport' => $sport->load('positions'),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Sport $sport, Position $position): RedirectResponse
    {
        $position->update($request->all([
            'name',
            'description',
            'preview_x',
            'preview_y',
            'sort_order',
            'default_number',
        ]));

        return to_route('sport.position.index', ['sport' => $sport]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport, Position $position): RedirectResponse
    {
        $position->delete();

        return to_route('sport.position.index', ['sport' => $sport]);
    }
}
