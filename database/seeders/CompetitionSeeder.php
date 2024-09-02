<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', Competition::class);
        $all = File::json(__DIR__."/seeds/{$fileName}.json");
        $this->command->withProgressBar(
            $all,
            function (array $item) {
                $model = new Competition($item);
                $model->id = $item['id'];
                $model->save();
            }
        );
    }
}
