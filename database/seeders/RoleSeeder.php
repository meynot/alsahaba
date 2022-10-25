<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
		$role->givePermissionTo(['users.*', 'posts.*', 'settings.*', 'roles.*']);

        $role = Role::create(['name' => 'supervisor']);
		$role->givePermissionTo(['users.*', 'posts.*']);

        $role = Role::create(['name' => 'editor']);
		$role->givePermissionTo(['posts.create', 'posts.browse']);

        $role = Role::create(['name' => 'member']);
		$role->givePermissionTo(['posts.browse']);

    }
}
