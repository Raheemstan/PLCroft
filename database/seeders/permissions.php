<?php

namespace Database\Seeders;

// use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /**
         * Create the initial roles and permissions.
         *
         * @return void
         */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add entries']);
        Permission::create(['name' => 'edit entries']);
        Permission::create(['name' => 'delete entries']);
        Permission::create(['name' => 'publish entries']);
        Permission::create(['name' => 'unpublish entries']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'account']);
        $role1->givePermissionTo('edit entries');
        $role1->givePermissionTo('delete entries');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish entries');
        $role2->givePermissionTo('unpublish entries');

        $role3 = Role::create(['name' => 'phoenix']);



        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        // $user = \App\Models\User::factory()->create([
        //     'name' => '',
        //     'email' => 'test@example.com',
        // ]);
        // $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'phoenix',
            'email' => 'phoenix@admin.com',
            'phone' => '2349071140264',
            'address' => 'Phoenix Administration',
            'password' => Hash::make('admin'),
        ]);
        $user->assignRole($role3);
    }
}
