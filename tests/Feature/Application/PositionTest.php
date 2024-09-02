<?php

namespace Tests\Feature\Application;

use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApplicationTest;

/**
 * @internal
 */
class PositionTest extends ApplicationTest
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('sport.position.index', ['sport' => '019169e3-e100-7449-926f-c544764b069f']));

        $response->assertStatus(200);
        $response->assertViewIs('position.index');
    }

    public function testShow(): void
    {
        $response = $this->get(route(
            'sport.position.show',
            [
                'sport' => '019169e3-e100-7449-926f-c544764b069f',
                'position' => '01917f7d-e01b-707f-981a-97172121b38b'
            ]
        ));
        $response->assertStatus(200);
        $response->assertViewIs('position.show');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('sport.position.create', ['sport' => '019169e3-e100-7449-926f-c544764b069f']));

        $response->assertStatus(200);
        $response->assertViewIs('position.create');
        $this->testFormOnPage(
            $response,
            'create-position-form',
            [
                'name' => self::class,
                'description' => self::class,
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'preview_x' => 1,
                'preview_y' => 1,
                'default_number' => 1,
                'sort_order' => 1,
            ],
        );

        $createdPosition = Position::where(
            'name',
            '=',
            self::class
        )->first();
        $this->assertNotNull($createdPosition);
        $this->assertEquals(self::class, $createdPosition->name);
        $this->assertEquals(self::class, $createdPosition->description);
    }

    public function testEditAndUpdate(): void
    {
        $positionId = '01917f7d-e01b-707f-981a-97172121b38b';
        $response = $this->get(route(
            'position.edit',
            [
                'position' => $positionId,
                'sport' => '019169e3-e100-7449-926f-c544764b069f'
            ]
        ));

        $response->assertStatus(200);
        $response->assertViewIs('position.edit');
        $this->testFormOnPage(
            $response,
            'edit-position-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
            [
                'name' => 'Fullback',
                'description' => null,
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',

                'preview_x' => 50,
                'preview_y' => 20,
                'sort_order' => 1,
                'default_number' => 1,
            ]
        );

        $createdPosition = Position::find($positionId);
        $this->assertNotNull($createdPosition);
        $this->assertEquals(self::class, $createdPosition->name);
    }

    public function testDelete(): void
    {
        $id = '01917f7d-e01b-707f-981a-97172121b38b';
        $position = Position::find($id);
        $this->assertNull($position->deleted_at);
        $this->delete(route('sport.position.destroy', ['sport' => '01917f7d-e01b-707f-981a-97172121b38b', 'position' => $id]));
        $position->refresh();
        $this->assertNotNull($position->deleted_at);
    }
}
