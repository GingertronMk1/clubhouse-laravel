<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class MakeAdminUser extends Command
{
    private const ADMIN_USER_NAME = 'Admin User';

    private const ADMIN_USER_EMAIL = 'admin@clubhouse.test';

    private const ADMIN_USER_PASSWORD = '12345678';

    public function __construct(
        private readonly CreatesNewUsers $userCreator
    )
    {
        parent::__construct();
    }

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
        $this->userCreator->create([
            'name' => self::ADMIN_USER_NAME,
            'email' => self::ADMIN_USER_EMAIL,
            'password' => self::ADMIN_USER_PASSWORD,
            'password_confirmation' => self::ADMIN_USER_PASSWORD,
            'terms' => 'true',
        ]);

        return self::SUCCESS;
    }
}
