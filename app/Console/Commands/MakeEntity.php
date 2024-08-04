<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class MakeEntity extends Command
{
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
        Artisan::call(
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
        Artisan::call(
            'make:test',
            [
                'name' => "Application/{$entityName}ControllerTest",
                '--phpunit' => true,
            ],
        );

        $pagesPath = resource_path("/js/Pages/{$entityName}");
        File::makeDirectory($pagesPath);
        foreach ([
            'Index',
            'Create',
            'Edit',
            'Show',
        ] as $fileName) {
            File::put(
                "{$pagesPath}/{$fileName}.vue",
                <<<'VUE'
<script setup lang="ts">
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

        File::put(
            resource_path("/js/Components/Forms/{$entityName}Form.vue"),
            <<<'VUE'
<script setup lang="ts">
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

const form = useForm(props.model);
</script>
<template>
    <form @submit.prevent="submitFn(form)">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
VUE,
        );

        return SymfonyCommand::SUCCESS;
    }
}
