<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', Position::class);
        $all = File::json(__DIR__ ."/seeds/{$fileName}.json") ?? [];
        $this->command->withProgressBar(
            $all,
            function (array $item) {
                $model = new Position($item);
                $model->id = $item['id'];
                $model->save();
            }
        );
    }
}
