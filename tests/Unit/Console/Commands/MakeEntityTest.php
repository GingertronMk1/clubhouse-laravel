<?php

namespace Tests\Unit\Console\Commands;

use App\Console\Commands\MakeEntity;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tests\TestCase;

class MakeEntityTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_command(): void
    {
        $entityName = 'Test';

        $command = new MakeEntity;

        Artisan::shouldReceive('call')
            ->once()
            ->with(
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
            );

        Artisan::shouldReceive('call')
            ->once()
            ->with(
                'make:test',
                [
                    'name' => "Application/{$entityName}ControllerTest",
                    '--phpunit' => true,
                ],
            );

        File::shouldReceive('makeDirectory')->once();
        File::shouldReceive('put')->times(5);

        $output = $this->createMock(OutputInterface::class);
        $input = $this->createMock(InputInterface::class);

        $input
            ->expects($this->once())
            ->method('getArgument')
            ->with('entityName')
            ->willReturn($entityName);

        $command->setLaravel($this->app);

        $command->run($input, $output);
    }
}
