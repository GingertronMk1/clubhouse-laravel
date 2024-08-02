<?php

namespace Tests\Feature\Application;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class DevServicesControllerTest extends TestCase
{
    public function test_invoke(): void
    {
        $response = $this->actingAs($this->user)->get(route('dev-services'));

        $response->assertStatus(200);
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('DevServices'));
    }
}
