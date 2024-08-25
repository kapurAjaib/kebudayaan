<?php

namespace Database\Seeders\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            // post or culture
            'create post',
            'edit post', 
            'delete post',

            // user
            'create user',
            'edit user',
            'delete user',

            // role
            'create role',
            'edit role',
            'delete role',

            // permission
            'create permission',
            'edit permission',
            'delete permission',

            // category
            'create tag',
            'edit tag',
            'delete tag',

            // event
            'create event',
            'edit event',
            'delete event',

            // comment
            'create comment',
            'edit comment',
            'delete comment',
        ];

        foreach($permission as $name){
            Permission::create(['name' => $name]);
        };
    }
}
