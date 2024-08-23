<?php

namespace Tests\Feature\Application;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApplicationTest;

/**
 * @internal
 */
class GameTest extends ApplicationTest
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('game.index'));

        $response->assertStatus(200);
        $response->assertViewIs('game.index');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('game.create'));

        $response->assertStatus(200);
        $response->assertViewIs('game.create');
        $this->testFormOnPage(
            $response,
            'create-game-form',
            [
                'name' => self::class,
                'description' => self::class,
                'competition_id' => '01917a02-df3d-73cc-97e2-149abace7445',
                'team_1_id' => '019169fb-9074-71e6-b455-f35854f9b70a',
                'team_2_id' => '019169fb-9078-70d8-9ea2-5e14e52cb760',
                'start' => '2024-04-15 19:30:00',
            ],
        );

        $createdGame = Game::where(
            'name',
            '=',
            self::class
        )->first();
        $this->assertNotNull($createdGame);
        $this->assertEquals(self::class, $createdGame->name);
        $this->assertEquals(self::class, $createdGame->description);
    }

    public function testEditAndUpdate(): void
    {
        $gameId = '01917a40-d448-715e-9b0e-614a99ae195c';
        $response = $this->get(route(
            'game.edit',
            [
                'game' => $gameId,
            ]
        ));

        $response->assertStatus(200);
        $response->assertViewIs('game.edit');
        $this->testFormOnPage(
            $response,
            'edit-game-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
            [
                'name' => 'World Championship Game 0',
                'description' => <<<'EOF'
                    Cupiditate et sequi corrupti ipsam necessitatibus. Nesciunt dolore quo quasi rerum sint enim quam. Eum vero molestiae modi sed aspernatur fuga voluptatem unde. Dolore et quia eaque assumenda voluptatibus.

                    Aut molestiae itaque et et. Qui amet natus mollitia. Ea accusantium eligendi non quasi. Tempore et quia architecto voluptas sint.

                    Omnis accusantium commodi autem. Numquam sapiente blanditiis adipisci quod. Voluptas officiis sunt cum ea. Quidem pariatur quod animi ad sint aut culpa.
                    EOF,
                'competition_id' => '01917a02-df3d-73cc-97e2-149abace7445',
                'team_1_id' => '019169fb-9074-71e6-b455-f35854f9b70a',
                'team_2_id' => '019169fb-9078-70d8-9ea2-5e14e52cb760',
            ]
        );

        $createdGame = Game::find($gameId);
        $this->assertNotNull($createdGame);
        $this->assertEquals(self::class, $createdGame->name);
    }

    public function testDelete(): void
    {
        $id = '01917a40-d448-715e-9b0e-614a99ae195c';
        $game = Game::find($id);
        $this->assertNull($game->deleted_at);
        $this->delete(route('game.destroy', $id));
        $game->refresh();
        $this->assertNotNull($game->deleted_at);
    }
}
