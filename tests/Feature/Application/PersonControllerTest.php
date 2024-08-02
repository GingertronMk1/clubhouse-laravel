<?php

namespace Tests\Feature\Application;

use App\Models\Person;
use App\Models\User;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class PersonControllerTest extends TestCase
{
    public function test_index(): void
    {
        $people = Person::factory(10)->create();
        $response = $this->actingAs($this->user)->get(route('person.index'));

        $response->assertStatus(200);
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Person/Index')
            ->has(
                'people',
                $people->count(),
                fn (AssertableInertia $page) => $page
                    ->where('name', $people->first()->name)
                    ->where('bio', $people->first()->bio)
                    ->where('dob', $people->first()->dob->jsonSerialize())
                    ->etc(),
            ));
    }

    public function test_create(): void
    {
        $users = User::factory(10)->create();
        $response = $this->actingAs($this->user)->get(route('person.create'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $page) => $page
                ->component('Person/Create')
                ->has(
                    'users',
                    User::count(),
                    fn (AssertableInertia $page) => $page
                        ->where('name', User::first()->name)
                        ->etc(),
                ),
        );
    }

    public function test_store(): void
    {
        $response = $this->actingAs($this->user)->post(route('person.store'), [
            'name' => 'Test Person 1',
            'bio' => 'Test Person 1 Bio',
            'dob' => '1997-04-15',
        ]);
        $response->assertRedirectToRoute('person.index');
    }

    public function test_show(): void
    {
        $person = Person::factory()->create();
        $response = $this->actingAs($this->user)->get(route('person.show', ['person' => $person]));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $page) => $page
                ->component('Person/Show')
                ->has(
                    'person',
                    fn (AssertableInertia $page) => $page
                        ->where('id', $person->id)
                        ->etc(),
                ),
        );
    }

    public function test_edit(): void
    {
        $users = User::factory(10)->create();
        $person = Person::factory()->create();
        $response = $this->actingAs($this->user)->get(route('person.edit', ['person' => $person]));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $page) => $page
                ->component('Person/Edit')
                ->has(
                    'person',
                    fn (AssertableInertia $page) => $page
                        ->where('id', $person->id)
                        ->etc(),
                )
                ->has(
                    'users',
                    User::count(),
                    fn (AssertableInertia $page) => $page
                        ->where('name', User::first()->name)
                        ->etc(),
                ),
        );
    }

    public function test_update(): void
    {
        $newName = self::class;
        $person = Person::factory()->create();
        $response = $this
            ->actingAs($this->user)
            ->put(
                route(
                    'person.update',
                    ['person' => $person],
                ),
                [
                    'name' => $newName,
                    'bio' => null,
                    'dob' => null,
                    'user_id' => null,
                ],
            );
        $response->assertRedirectToRoute('person.index');
        $person->refresh();
        $this->assertEquals($newName, $person->name);
    }

    public function test_destroy(): void
    {
        $person = Person::factory()->create();
        $this->assertNull($person->deleted_at);

        $response = $this->actingAs($this->user)->delete(route('person.destroy', ['person' => $person]));
        $response->assertRedirectToRoute('person.index');
        $person->refresh();
        $this->assertNotNull($person->deleted_at);
    }
}
