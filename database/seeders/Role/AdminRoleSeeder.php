<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo([
            'create post',
            'edit post',
            'delete post',

            'create user',
            'edit user',
            'delete user',

            'create role',
            'edit role',
            'delete role',

            'create permission',
            'edit permission',
            'delete permission',

            'create tag',
            'edit tag',
            'delete tag',

            'create event',
            'edit event',
            'delete event',

            'create comment',
            'edit comment',
            'delete comment',
        ]);
    }
}
