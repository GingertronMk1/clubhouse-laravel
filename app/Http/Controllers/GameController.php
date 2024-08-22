<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view(
            'game.index',
            [
                'games' => Game::with(['team1', 'team2', 'competition'])->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view(
            'game.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request): RedirectResponse
    {
        Game::create($request->all());

        return to_route('game.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): Application|Factory|View
    {
        return view(
            'game.show',
            [
                'game' => $game,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game): Application|Factory|View
    {
        return view(
            'game.edit',
            [
                'game' => $game,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game): RedirectResponse
    {
        $game->update($request->all());

        return to_route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();

        return to_route('game.index');
    }
}
