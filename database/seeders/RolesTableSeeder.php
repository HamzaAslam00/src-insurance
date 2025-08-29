<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        // Permissions
        $permissions = Permission::get()->pluck('id');

        // Assign permissions to roles
        $admin = Role::updateOrCreate(['name' => 'admin', 'title' => 'Admin', 'is_deleteable' => 0]);
        $client = Role::updateOrCreate(['name' => 'client', 'title' => 'Client', 'is_deleteable' => 0]);

        $client->givePermissionTo(['request_a_quote','edit_client','view_policies','view_clients','edit_policy','view_notices','edit_notice','view_payments']);

        $admin->permissions()->sync($permissions);
    }
}
