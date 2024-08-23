<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', User::class);
        $all = Storage::json("seeds/{$fileName}.json") ?? [];
        $password = Hash::make('password');
        $this->command->withProgressBar(
            $all,
            function (array $item) use ($password) {
                $model = new User($item);
                $model->id = $item['id'];
                $model->password = $password;
                $model->save();
            }
        );
    }
}
