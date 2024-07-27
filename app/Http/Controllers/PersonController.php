<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return $this->inertia(
            component: 'Person/Index',
            props: ['people' => Person::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return $this->inertia(
            component: 'Person/Create',
            props: ['users' => User::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request): Response
    {
        Person::create($request->validated());
        return to_route('person.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person): \Inertia\Response
    {
        return $this->inertia(
            'Person/Show',
            ['person' => $person]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person): \Inertia\Response
    {
        return $this->inertia(
            component: 'Person/Edit',
            props: [
                'users' => User::all(),
                'person' => $person,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person): RedirectResponse|\Inertia\Response
    {
        if ($person->update($request->validated())) {
            return to_route('person.index');
        }

        return $this->inertia(
            component: 'Person/Edit',
            props: [
                'users' => User::all(),
                'person' => $person,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Person $person): Response
    {
        if (! $person->delete()) {
            $request->session()->flash('error', 'There was an error deleting that person');
        }

        return to_route('person.index');
    }
}
