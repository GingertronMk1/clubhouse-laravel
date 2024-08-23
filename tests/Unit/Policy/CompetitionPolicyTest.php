<?php

namespace Tests\Unit\Policy;

use App\Models\Competition;
use App\Models\User;
use App\Policies\CompetitionPolicy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class CompetitionPolicyTest extends TestCase
{
    private CompetitionPolicy $policy;
    private Competition $competition;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new CompetitionPolicy();
        $this->competition = new Competition();
        $this->user = new User();
    }

    public function test(): void
    {
        foreach (get_class_methods($this->policy) as $method) {
            $this->assertTrue(
                call_user_func(
                    [$this->policy, $method],
                    $this->user,
                    $this->competition
                ),
                $method
            );
        }
    }
}
