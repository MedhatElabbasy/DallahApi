<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;
use Modules\Auth\database\seeders\AuthDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(Module::has('Auth'))
            $this->call([
                AuthDatabaseSeeder::class
            ]);
    }
}
