<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
		
		$permissions = [
			'users.browse',
			'users.create',
			'users.edit',
			'users.delete',
			'users.status',
			
			'roles.create',
			'roles.edit',
			'roles.delete',
			'roles.browse',
			
			'posts.browse',
			'posts.create',
			'posts.edit',
			'posts.delete',
			
			
			'settings.*',
			'users.*',
			'posts.*',
			'roles.*',
		];
		
		foreach( $permissions as $permit )
			Permission::create(['name' => $permit]);

    }
}
