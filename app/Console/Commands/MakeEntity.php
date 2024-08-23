<?php

namespace App\Console\Commands;

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;
use Illuminate\Console\Command;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Foundation\Console\TestMakeCommand;
use Illuminate\Foundation\Console\ViewMakeCommand;

class MakeEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-entity {entityName*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private readonly Inflector $inflector;

    public function __construct()
    {
        parent::__construct();
        $this->inflector = InflectorFactory::create()->build();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $entityNames = $this->argument('entityName');
        foreach ($entityNames as $entityKey => $entityName) {
            $this->call(
                ModelMakeCommand::class,
                [
                    'name' => $entityName,
                    '--all' => true,
                ]
            );

            $viewDir = $this->inflector->camelize($entityName);
            foreach ($this->getCrudOperations() as $operation) {
                $this->call(
                    ViewMakeCommand::class,
                    [
                        'name' => "{$viewDir}/{$operation}",
                    ]
                );
            }

            $this->call(
                TestMakeCommand::class,
                [
                    'name' => "Application/{$entityName}Test",
                    '--phpunit' => true,
                ]
            );

            if ($entityKey !== array_key_last($entityNames)) {
                $this->output->info('Sleeping for a second to make migrations order right');
                sleep(1);
            }
        }

        return self::SUCCESS;
    }

    /**
     * @return array<string>
     */
    private function getCrudOperations(): array
    {
        return [
            'create',
            'edit',
            'index',
            'show',
        ];
    }
}
