<?php

namespace Tests\Unit\Policy;

use App\Models\Sport;
use App\Models\User;
use App\Policies\SportPolicy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class SportPolicyTest extends TestCase
{
    private SportPolicy $policy;
    private Sport $sport;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new SportPolicy();
        $this->sport = new Sport();
        $this->user = new User();
    }

    public function test(): void
    {
        foreach (get_class_methods($this->policy) as $method) {
            $this->assertTrue(
                call_user_func(
                    [$this->policy, $method],
                    $this->user,
                    $this->sport
                ),
                $method
            );
        }
    }
}
