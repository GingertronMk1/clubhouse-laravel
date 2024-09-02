<?php

namespace Tests\Unit\Policy;

use App\Models\Game;
use App\Models\User;
use App\Policies\GamePolicy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class GamePolicyTest extends TestCase
{
    private GamePolicy $policy;
    private Game $game;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new GamePolicy();
        $this->game = new Game();
        $this->user = new User();
    }

    public function test(): void
    {
        foreach (get_class_methods($this->policy) as $method) {
            $this->assertTrue(
                call_user_func(
                    [$this->policy, $method],
                    $this->user,
                    $this->game
                ),
                $method
            );
        }
    }
}
