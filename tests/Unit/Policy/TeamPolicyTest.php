<?php

namespace Tests\Unit\Policy;

use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class TeamPolicyTest extends TestCase
{
    private TeamPolicy $policy;
    private Team $team;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new TeamPolicy();
        $this->team = new Team();
        $this->user = new User();
    }

    public function test(): void
    {
        foreach (get_class_methods($this->policy) as $method) {
            $this->assertTrue(
                call_user_func(
                    [$this->policy, $method],
                    $this->user,
                    $this->team
                ),
                $method
            );
        }
    }
}
