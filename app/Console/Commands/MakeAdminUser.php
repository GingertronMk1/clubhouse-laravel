<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Console\Command;

class MakeAdminUser extends Command
{
    private const ADMIN_USER_NAME = 'Admin User';

    private const ADMIN_USER_EMAIL = 'admin@clubhouse.test';

    private const ADMIN_USER_PASSWORD = '12345678';

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
        $userCreator = new CreateNewUser;

        $userCreator->create([
            'name' => self::ADMIN_USER_NAME,
            'email' => self::ADMIN_USER_EMAIL,
            'password' => self::ADMIN_USER_PASSWORD,
            'password_confirmation' => self::ADMIN_USER_PASSWORD,
            'terms' => 'true',
        ]);

        return self::SUCCESS;
    }
}
