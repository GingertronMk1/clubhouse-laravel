<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class MakeEntity extends Command
{
    public function __construct(
        private readonly Filesystem $filesystem
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-entity {entityName?}';

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
        if (! $entityName) {
            $entityName = $this->ask('What is the name of the entity?');
        }
        $this->runCommand(
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
            $this->output,
        );
        $this->runCommand(
            'make:test',
            [
                'name' => "Application/{$entityName}ControllerTest",
                '--phpunit' => true,
            ],
            $this->output,
        );

        $pagesPath = resource_path("/js/Pages/{$entityName}");
        $this->filesystem->makeDirectory($pagesPath);
        foreach ([
            'Index',
            'Create',
            'Edit',
            'Show',
        ] as $fileName) {
            $this->filesystem->put(
                "{$pagesPath}/{$fileName}.vue",
                <<<'VUE'
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout>

    </AppLayout>
</template>
VUE,
            );
            $this->output->info("Created {$fileName}.vue");
        }

        $this->filesystem->put(
            resource_path("/js/Components/Forms/{$entityName}Form.vue"),
            <<<'VUE'
<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    model: {
        required: true,
        type: Object,
    },
    submitFn: {
        required: true,
        type: Function,
    },
});

const form = useForm(props.form);
</script>
<template>
    <form @submit.prevent="submitFn(form)"> </form>
</template>
VUE,
        );

        return Command::SUCCESS;
    }
}
