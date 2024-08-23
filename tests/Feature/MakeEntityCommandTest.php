<?php

namespace Tests\Feature;

use App\Console\Commands\MakeEntity;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Foundation\Console\TestMakeCommand;
use Illuminate\Foundation\Console\ViewMakeCommand;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Tests\TestCase;

/**
 * @internal
 */
class MakeEntityCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test(): void
    {
        Artisan::shouldReceive('call')
            ->with(
                ModelMakeCommand::class,
                [
                    'name' => 'TestEntity',
                    '--all' => true,
                ]
            )
            ->once()
            ->andReturn(Command::SUCCESS)
        ;

        Artisan::shouldReceive('call')
            ->withSomeOfArgs(ViewMakeCommand::class)
            ->times(4)
            ->andReturn(Command::SUCCESS)
        ;

        Artisan::shouldReceive('call')
            ->with(
                TestMakeCommand::class,
                [
                    'name' => 'Application/TestEntityTest',
                    '--phpunit' => true,
                ]
            )
            ->once()
            ->andReturn(Command::SUCCESS)
        ;

        $command = new MakeEntity();
        $input = $this->createMock(InputInterface::class);
        $input
            ->expects(self::once())
            ->method('getArgument')
            ->with('entityName')
            ->willReturn(['TestEntity'])
        ;
        $command->setInput($input);
        $this->assertEquals(0, $command->handle());
    }
}
