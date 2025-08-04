<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        
        $permissions = [
            'editor.post.index',
            'editor.post.create',
            'editor.post.update',
            'editor.post.destroy',
            'editor.category.index',
            'editor.category.create',
            'editor.category.update',
            'editor.category.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
