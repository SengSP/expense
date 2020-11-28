<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Client']);
        // Permission::create(['name' => 'Add']);
        // Permission::create(['name' => 'Edit']);
        // Permission::create(['name' => 'Delete']);
        // Permission::create(['name' => 'View']);
        // Permission::create(['name' => 'ManageUser']);
    }
}
