<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sport $sport)
    {
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
    public function create(Sport $sport)
    {
        return view(
            'position.create',
            [ 'sport' => $sport ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Sport $sport)
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
    public function show(Sport $sport, Position $position)
    {
        return view(
            'position.show',
            [
                'position' => $position,
                'sport' => $sport
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport, Position $position)
    {
        return view(
            'position.edit',
            [
                'position' => $position,
                'sport' => $sport
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport, Position $position)
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
    public function destroy(Sport $sport, Position $position)
    {
        $position->delete();

        return to_route('sport.position.index', ['sport' => $sport]);
    }
}
