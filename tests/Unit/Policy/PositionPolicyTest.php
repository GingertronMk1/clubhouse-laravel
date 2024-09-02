<?php

namespace Tests\Unit\Policy;

use App\Models\Position;
use App\Models\User;
use App\Policies\PositionPolicy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class PositionPolicyTest extends TestCase
{
    private PositionPolicy $policy;
    private Position $position;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new PositionPolicy();
        $this->position = new Position();
        $this->user = new User();
    }

    public function test(): void
    {
        foreach (get_class_methods($this->policy) as $method) {
            $this->assertTrue(
                call_user_func(
                    [$this->policy, $method],
                    $this->user,
                    $this->position
                ),
                $method
            );
        }
    }
}
