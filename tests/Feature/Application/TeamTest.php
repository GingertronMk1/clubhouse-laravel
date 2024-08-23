<?php

namespace Tests\Feature\Application;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApplicationTest;

/**
 * @internal
 */
class TeamTest extends ApplicationTest
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('team.index'));

        $response->assertStatus(200);
        $response->assertViewIs('team.index');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('team.create'));

        $response->assertStatus(200);
        $response->assertViewIs('team.create');
        $this->testFormOnPage(
            $response,
            'create-team-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
        );

        $createdTeam = Team::where(
            'name',
            '=',
            self::class
        )->first();
        $this->assertNotNull($createdTeam);
        $this->assertEquals(self::class, $createdTeam->name);
        $this->assertEquals(self::class, $createdTeam->description);
    }

    public function testEditAndUpdate(): void
    {
        $teamId = '019169fb-9074-71e6-b455-f35854f9b70a';
        $response = $this->get(route(
            'team.edit',
            [
                'team' => $teamId,
            ]
        ));

        $response->assertStatus(200);
        $response->assertViewIs('team.edit');
        $this->testFormOnPage(
            $response,
            'edit-team-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
            [
                'name' => 'Arizona Cardinals',
                'description' => null,
                'colours' => [
                    '#97233F',
                    '#000000',
                    '#FFB612',
                ],
            ]
        );

        $createdTeam = Team::find($teamId);
        $this->assertNotNull($createdTeam);
        $this->assertEquals(self::class, $createdTeam->name);
    }

    public function testDelete(): void
    {
        $id = '019169fb-9074-71e6-b455-f35854f9b70a';
        $team = Team::find($id);
        $this->assertNull($team->deleted_at);
        $this->delete(route('team.destroy', $id));
        $team->refresh();
        $this->assertNotNull($team->deleted_at);
    }
}
