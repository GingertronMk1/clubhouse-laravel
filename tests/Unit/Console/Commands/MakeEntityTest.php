<?php

namespace Tests\Unit\Console\Commands;

use App\Console\Commands\MakeAdminUser;
use App\Console\Commands\MakeEntity;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Symfony\Component\Console\Output\OutputInterface;
use Tests\TestCase;

class MakeEntityTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $fileSystem = $this->createMock(Filesystem::class);

        $command = new MakeEntity($fileSystem);
        $entityName = 'Test';

        Artisan::shouldReceive('call')->once()->with(
            'make:model',
            [
                'name' => $entityName,
                '--migration' => true,
                '--factory' => true,
                '--policy' => true,
                '--resource' => true,
                '--controller' => true,
                '--requests' => true,
            ],
            $this->createMock(OutputInterface::class)
        );

        $commandResult = $command->handle();
        $this->assertEquals(0, $commandResult);
    }
}
