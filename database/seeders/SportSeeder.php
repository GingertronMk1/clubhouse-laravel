<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', Sport::class);
        $all = Storage::json("seeds/{$fileName}.json") ?? [];
        $this->command->withProgressBar(
            $all,
            function (array $item) {
                $model = new Sport($item);
                $model->id = $item['id'];
                $model->save();
            }
        );
    }
}
