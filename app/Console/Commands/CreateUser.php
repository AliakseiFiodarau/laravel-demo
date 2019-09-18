<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('enter ur name');
        $email = $this->ask('enter ur email');
        $password = $this->secret('enter ur password');
        $rePassword = $this->secret('repeat ur password');
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password === $rePassword) {
                return User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
            } else {
                return $this->error('passwords do not match');
            }
        } else {
            return $this->error('email is incorrect');
        }
    }
}
