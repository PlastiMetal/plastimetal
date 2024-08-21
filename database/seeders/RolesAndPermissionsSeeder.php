<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // Crear roles y asignar permisos
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('edit articles');
        $role->givePermissionTo('delete articles');
        $role->givePermissionTo('publish articles');
        $role->givePermissionTo('unpublish articles');

        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('edit articles');
        $role->givePermissionTo('publish articles');
    }
}
