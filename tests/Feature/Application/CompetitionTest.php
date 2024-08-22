<?php

namespace Tests\Feature\Application;

use App\Models\Competition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApplicationTest;

/**
 * @internal
 */
class CompetitionTest extends ApplicationTest
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('competition.index'));

        $response->assertStatus(200);
        $response->assertViewIs('competition.index');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('competition.create'));

        $response->assertStatus(200);
        $response->assertViewIs('competition.create');
        $this->testFormOnPage(
            $response,
            'create-competition-form',
            [
                'name' => self::class,
                'description' => self::class,
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
            ],
        );

        $createdCompetition = Competition::where(
            'name',
            '=',
            self::class
        )->first();
        $this->assertNotNull($createdCompetition);
        $this->assertEquals(self::class, $createdCompetition->name);
        $this->assertEquals(self::class, $createdCompetition->description);
    }

    public function testEditAndUpdate(): void
    {
        $competitionId = '01917a02-df3d-73cc-97e2-149abace7445';
        $response = $this->get(route(
            'competition.edit',
            [
                'competition' => $competitionId,
            ]
        ));

        $response->assertStatus(200);
        $response->assertViewIs('competition.edit');
        $this->testFormOnPage(
            $response,
            'edit-competition-form',
            [
                'name' => self::class,
                'description' => self::class,
            ],
            [
                'name' => 'World Championship',
                'description' => <<<'EOF'
                    Cupiditate odio tempore assumenda modi aut. Qui atque facere eos aut mollitia esse. Omnis sit ipsam accusantium voluptatem.

                    Fugiat harum nihil qui suscipit. Dignissimos dolorem numquam molestiae provident. Perspiciatis cupiditate illo ea fugit commodi nostrum quia.

                    Nemo nihil architecto sequi aut. Ut delectus laudantium autem excepturi voluptas cum magni. Aspernatur porro aut voluptatem vel ad officiis laudantium laboriosam. Non id vitae laudantium quas consectetur voluptatem.
                    EOF,
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
            ]
        );

        $createdCompetition = Competition::find($competitionId);
        $this->assertNotNull($createdCompetition);
        $this->assertEquals(self::class, $createdCompetition->name);
    }
}
