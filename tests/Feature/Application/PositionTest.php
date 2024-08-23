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
        $response = $this->get(route('position.index'));

        $response->assertStatus(200);
        $response->assertViewIs('position.index');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('position.create'));

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
        $this->markTestSkipped('Not doing this one until we\'ve got seeds');
        $positionId = '01917a02-df3d-73cc-97e2-149abace7445';
        $response = $this->get(route(
            'position.edit',
            [
                'position' => $positionId,
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
                'name' => 'World Championship',
                'description' => <<<'EOF'
                    Cupiditate odio tempore assumenda modi aut. Qui atque facere eos aut mollitia esse. Omnis sit ipsam accusantium voluptatem.

                    Fugiat harum nihil qui suscipit. Dignissimos dolorem numquam molestiae provident. Perspiciatis cupiditate illo ea fugit commodi nostrum quia.

                    Nemo nihil architecto sequi aut. Ut delectus laudantium autem excepturi voluptas cum magni. Aspernatur porro aut voluptatem vel ad officiis laudantium laboriosam. Non id vitae laudantium quas consectetur voluptatem.
                    EOF,
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
            ]
        );

        $createdPosition = Position::find($positionId);
        $this->assertNotNull($createdPosition);
        $this->assertEquals(self::class, $createdPosition->name);
    }

    public function testDelete(): void
    {
        $id = '01917a02-df3d-73cc-97e2-149abace7445';
        $position = Position::find($id);
        $this->assertNull($position->deleted_at);
        $this->delete(route('position.destroy', $id));
        $position->refresh();
        $this->assertNotNull($position->deleted_at);
    }
}
