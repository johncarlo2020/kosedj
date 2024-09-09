<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangeUserPassword extends Command
{
    protected $signature = 'user:change-password {user_id} {new_password}';
    protected $description = 'Change the password of a specific user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userId = $this->argument('user_id');
        $newPassword = $this->argument('new_password');

        $user = User::find($userId);

        if (!$user) {
            $this->error('User not found.');
            return 1;
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        $this->info('Password changed successfully.');
        return 0;
    }
}
