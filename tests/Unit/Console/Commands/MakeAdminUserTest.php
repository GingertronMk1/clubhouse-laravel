<?php

namespace Tests\Unit\Console\Commands;

use App\Console\Commands\MakeAdminUser;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Tests\TestCase;

class MakeAdminUserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $userCreator = $this->createMock(CreatesNewUsers::class);

        $userCreator->expects($this->once())->method('create')->with([
            'name' => 'Admin User',
            'email' => 'admin@clubhouse.test',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'terms' => 'true',
        ]);

        $command = new MakeAdminUser($userCreator);
        $commandResult = $command->handle();
        $this->assertEquals(0, $commandResult);
    }
}
