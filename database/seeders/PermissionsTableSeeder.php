<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        $permissions = [

            // Roles
            ['group' => 'roles', 'name' => 'view_roles', 'title' => 'View Roles', 'guard_name' => 'web'],
            ['group' => 'roles', 'name' => 'add_role', 'title' => 'Add Role', 'guard_name' => 'web'],
            ['group' => 'roles', 'name' => 'edit_role', 'title' => 'Edit Role', 'guard_name' => 'web'],
            ['group' => 'roles', 'name' => 'delete_role', 'title' => 'Delete Role', 'guard_name' => 'web'],

            // Users
            ['group' => 'users', 'name' => 'view_users', 'title' => 'View Users', 'guard_name' => 'web'],
            ['group' => 'users', 'name' => 'add_user', 'title' => 'Add User', 'guard_name' => 'web'],
            ['group' => 'users', 'name' => 'edit_user', 'title' => 'Edit User', 'guard_name' => 'web'],
            ['group' => 'users', 'name' => 'delete_user', 'title' => 'Delete User', 'guard_name' => 'web'],


            // Clients
            ['group' => 'clients', 'name' => 'view_clients', 'title' => 'View Clients', 'guard_name' => 'web'],
            ['group' => 'clients', 'name' => 'add_client', 'title' => 'Add Client', 'guard_name' => 'web'],
            ['group' => 'clients', 'name' => 'edit_client', 'title' => 'Edit Client', 'guard_name' => 'web'],
            ['group' => 'clients', 'name' => 'delete_client', 'title' => 'Delete Client', 'guard_name' => 'web'],
            // Policies
            ['group' => 'policies', 'name' => 'view_policies', 'title' => 'View Policies', 'guard_name' => 'web'],
            ['group' => 'policies', 'name' => 'add_policy', 'title' => 'Add Policy', 'guard_name' => 'web'],
            ['group' => 'policies', 'name' => 'edit_policy', 'title' => 'Edit Policy', 'guard_name' => 'web'],
            ['group' => 'policies', 'name' => 'delete_policy', 'title' => 'Delete Policy', 'guard_name' => 'web'],
            //Notes
            ['group' => 'notices', 'name' => 'view_notices', 'title' => 'View Notices', 'guard_name' => 'web'],
            ['group' => 'notices', 'name' => 'add_notice', 'title' => 'Add Notice', 'guard_name' => 'web'],
            ['group' => 'notices', 'name' => 'edit_notice', 'title' => 'Edit Notice', 'guard_name' => 'web'],
            ['group' => 'notices', 'name' => 'delete_notice', 'title' => 'Delete Notice', 'guard_name' => 'web'],
            // Quotes
            ['group' => 'quotes', 'name' => 'request_a_quote', 'title' => 'Request A Quote', 'guard_name' => 'web'],
            ['group' => 'quotes', 'name' => 'view_pending_quotes', 'title' => 'View Pending Quotes', 'guard_name' => 'web'],
            ['group' => 'quotes', 'name' => 'delete_pending_quote', 'title' => 'Delete Pending Quote', 'guard_name' => 'web'],
           //  Payments
            ['group' => 'payments', 'name' => 'view_payments', 'title' => 'View Payments', 'guard_name' => 'web'],
            ['group' => 'payments', 'name' => 'add_payment', 'title' => 'Add Payment', 'guard_name' => 'web'],
            ['group' => 'payments', 'name' => 'edit_payment', 'title' => 'Edit Payment', 'guard_name' => 'web'],
            ['group' => 'payments', 'name' => 'delete_payment', 'title' => 'Delete Payment', 'guard_name' => 'web'],


        ];
        Permission::insert($permissions);
    }
}
