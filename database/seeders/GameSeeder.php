<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', Game::class);
        $all = File::json(__DIR__."/seeds/{$fileName}.json");
        $this->command->withProgressBar(
            $all,
            function (array $item) {
                $model = new Game($item);
                $model->id = $item['id'];
                $model->save();
            }
        );
    }
}
