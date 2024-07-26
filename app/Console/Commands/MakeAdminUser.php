<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Console\Command;

class MakeAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-admin-user';

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
        $userCreator = new CreateNewUser();

        $userCreator->create([
            'name' => 'Admin User',
            'email' => 'admin@clubhouse.test',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'terms' => 'accepted'
        ]);

        return self::SUCCESS;
    }
}
