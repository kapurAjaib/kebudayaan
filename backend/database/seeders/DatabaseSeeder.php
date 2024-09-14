<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
            PermissionSeeder::class,
            AdminRoleSeeder::class,
            UserRoleSeeder::class,
            WriterRoleSeeder::class,

            // user
            AdminSeeder::class,
        ]);

        $user = User::factory(100)->create();
        $user->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
