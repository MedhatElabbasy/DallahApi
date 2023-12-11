<?php

namespace Modules\Auth\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
                'email' => 'admin@email.com',
            ],[
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'phone' => '+20123456789',
                'password' => 'password',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
        ]);
    }
}
