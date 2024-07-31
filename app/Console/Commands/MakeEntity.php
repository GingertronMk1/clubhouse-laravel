<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-entity {entityName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $entityName = $this->argument('entityName');
        $this->runCommand(
            "make:model",
            [
                'name' => 'Team',
                '--migration' => true,
                '--factory' => true,
                '--policy' => true,
                '--resource' => true,
                '--controller' => true,
                '--requests' => true,
            ],
            $this->output
        );
        $this->runCommand(
            "make:test",
            [
                'name' => "Application/{$entityName}ControllerTest",
                '--phpunit' => true
            ],
            $this->output
        );

        $pagesPath = resource_path("/js/Pages/{$entityName}");
        $fs = new Filesystem();
        $fs->ensureDirectoryExists($pagesPath);
        foreach ([
            'Index',
            'Create',
            'Edit',
            'Show'
                 ] as $fileName) {
            $fs->put(
                "{$pagesPath}/{$fileName}.vue",
                <<<VUE
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout>

    </AppLayout>
</template>
VUE
);
            $this->output->info("Created {$fileName}.vue");
        }

        return Command::SUCCESS;
    }
}
