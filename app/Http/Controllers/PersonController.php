<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view(
            'person.index',
            [
                'persons' => Person::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view(
            'person.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request): RedirectResponse
    {
        Person::create($request->all());

        return to_route('person.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person): Application|Factory|View
    {
        return view(
            'person.show',
            [
                'person' => $person,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person): Application|Factory|View
    {
        return view(
            'person.edit',
            [
                'person' => $person,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person): RedirectResponse
    {
        $person->update($request->all());

        return to_route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person): RedirectResponse
    {
        $person->delete();

        return to_route('person.index');
    }
}
