<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Permission\PermissionSeeder;
use Database\Seeders\Role\AdminRoleSeeder;
use Database\Seeders\Role\UserRoleSeeder;
use Database\Seeders\Role\WriterRoleSeeder;
use Database\Seeders\User\AdminSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminRoleSeeder::class,
            UserRoleSeeder::class,
            WriterRoleSeeder::class,
            PermissionSeeder::class,

            // user
            AdminSeeder::class,
        ]);
    }
}
