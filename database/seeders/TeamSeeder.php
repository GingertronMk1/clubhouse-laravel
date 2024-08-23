<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', Team::class);
        $all = File::json(__DIR__ ."/seeds/{$fileName}.json") ?? [];
        $this->command->withProgressBar(
            $all,
            function (array $item) {
                $model = new Team($item);
                $model->id = $item['id'];
                $model->save();
            }
        );
    }
}
