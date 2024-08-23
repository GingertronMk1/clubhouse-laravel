<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', Person::class);
        $all = File::json(__DIR__ ."/seeds/{$fileName}.json") ?? [];
        $this->command->withProgressBar(
            $all,
            function (array $item) {
                $model = new Person($item);
                $model->id = $item['id'];
                $model->save();
            }
        );
    }
}
