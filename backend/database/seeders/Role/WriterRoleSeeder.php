<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class WriterRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo([
            'create post',
            'edit post',
            'delete post',
            'create comment',
            'edit comment',
            'delete comment',
            'create tag',
            'edit tag',
            'delete tag',
        ]);
    }
}
