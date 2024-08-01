<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|Responsable
    {
        return $this->inertia(
            component: 'Person/Index',
            props: ['people' => Person::all()],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|Responsable
    {
        return $this->inertia(
            component: 'Person/Create',
            props: ['users' => User::all()],
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request): Response|Responsable
    {
        Person::create($request->validated());

        return to_route('person.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person): Response|Responsable
    {
        return $this->inertia(
            'Person/Show',
            ['person' => $person],
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person): Response|Responsable
    {
        return $this->inertia(
            component: 'Person/Edit',
            props: [
                'users' => User::all(),
                'person' => $person,
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person): Response|Responsable
    {
        $person->update($request->validated());

        return to_route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person): Response|Responsable
    {
        $person->delete();

        return to_route('person.index');
    }
}
