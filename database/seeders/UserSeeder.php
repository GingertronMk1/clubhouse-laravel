<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private const PASSWORD = 'password';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = str_replace('\\', '_', User::class);
        $all = File::json(__DIR__."/seeds/{$fileName}.json");
        $password = Hash::make(self::PASSWORD);
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
