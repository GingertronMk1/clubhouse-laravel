<?php

namespace Tests\Unit\Policy;

use App\Models\Person;
use App\Models\User;
use App\Policies\PersonPolicy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class PersonPolicyTest extends TestCase
{
    private PersonPolicy $policy;
    private Person $person;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new PersonPolicy();
        $this->person = new Person();
        $this->user = new User();
    }

    public function test(): void
    {
        foreach (get_class_methods($this->policy) as $method) {
            $this->assertTrue(
                call_user_func(
                    [$this->policy, $method],
                    $this->user,
                    $this->person
                ),
                $method
            );
        }
    }
}
