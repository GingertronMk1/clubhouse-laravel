<?php

namespace Tests\Feature\Application;

use App\Models\Person;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function test_invoke(): void
    {
        $numPeople = 10;
        Person::factory($numPeople)->create();
        $response = $this->actingAs($this->user)->get(route('index'));
        $response->assertStatus(200);
        $response->assertInertia(fn (AssertableInertia $page) => $page->where('peopleCount', $numPeople));
    }
}
