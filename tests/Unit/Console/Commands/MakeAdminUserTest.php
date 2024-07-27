<?php

namespace Tests\Unit\Console\Commands;

use Tests\TestCase;

class MakeAdminUserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->artisan('app:make-admin-user')->assertExitCode(0);
    }
}
