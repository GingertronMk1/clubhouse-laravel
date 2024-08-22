<?php

namespace Tests\Feature\Application;

use App\Models\Sport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApplicationTest;

/**
 * @internal
 */
class SportTest extends ApplicationTest
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('sport.index'));

        $response->assertStatus(200);
        $response->assertViewIs('sport.index');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('sport.create'));

        $response->assertStatus(200);
        $response->assertViewIs('sport.create');
        $this->testFormOnPage(
            $response,
            'create-sport-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
        );

        $createdSport = Sport::where(
            'name',
            '=',
            self::class
        )->first();
        $this->assertNotNull($createdSport);
        $this->assertEquals(self::class, $createdSport->name);
        $this->assertEquals(self::class, $createdSport->description);
    }

    public function testEditAndUpdate(): void
    {
        $response = $this->get(route('sport.edit', ['sport' => '019169e3-e100-7449-926f-c544764b069f']));

        $response->assertStatus(200);
        $response->assertViewIs('sport.edit');
        $this->testFormOnPage(
            $response,
            'edit-sport-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
            [
                'name' => 'Rugby League',
                'description' => '',
            ]
        );

        $createdSport = Sport::find('019169e3-e100-7449-926f-c544764b069f');
        $this->assertNotNull($createdSport);
        $this->assertEquals(self::class, $createdSport->name);
    }
}
