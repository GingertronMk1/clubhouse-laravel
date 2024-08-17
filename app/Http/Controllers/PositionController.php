<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view(
            'position.index',
            [
                'positions' => Position::get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view(
            'position.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request): RedirectResponse
    {
        Position::create($request->all());

        return to_route('position.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position): Application|Factory|View
    {
        return view(
            'position.show',
            [
                'position' => $position,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position): Application|Factory|View
    {
        return view(
            'position.edit',
            [
                'position' => $position,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position): RedirectResponse
    {
        $position->update($request->all());

        return to_route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position): RedirectResponse
    {
        $position->delete();

        return to_route('position.index');
    }
}
