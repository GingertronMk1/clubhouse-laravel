<?php

namespace Tests\Feature\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 */
class SportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testExample(): void
    {
        $response = $this->get(route('sport.index'));

        $response->assertStatus(200);
    }
}
