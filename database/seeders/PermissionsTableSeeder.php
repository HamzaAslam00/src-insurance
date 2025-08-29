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
            ['group' => 'users', 'name' => 'upload_document', 'title' => 'Upload Document', 'guard_name' => 'web'],
            
            // User Documents
            ['group' => 'user_documents', 'name' => 'view_documents', 'title' => 'View Documents', 'guard_name' => 'web'],
            ['group' => 'user_documents', 'name' => 'add_document', 'title' => 'Add Document', 'guard_name' => 'web'],
            ['group' => 'user_documents', 'name' => 'delete_document', 'title' => 'Delete Document', 'guard_name' => 'web'],
            ['group' => 'user_documents', 'name' => 'download_document', 'title' => 'Download Document', 'guard_name' => 'web'],

             // Holiday Agenda
            ['group' => 'holiday', 'name' => 'view_holiday', 'title' => 'View Holiday', 'guard_name' => 'web'],
            ['group' => 'holiday', 'name' => 'create_holiday', 'title' => 'Add Holiday', 'guard_name' => 'web'],
            ['group' => 'holiday', 'name' => 'delete_holiday', 'title' => 'Delete Holiday', 'guard_name' => 'web'],
            ['group' => 'holiday', 'name' => 'edit_holiday', 'title' => 'Edit Holiday', 'guard_name' => 'web'],
            
              // Personal File
            ['group' => 'personal_file', 'name' => 'view_personal_file', 'title' => 'View Personal File', 'guard_name' => 'web'],

            // leaves
            ['group' => 'leaves', 'name' => 'view_leaves', 'title' => 'View leaves', 'guard_name' => 'web'],
            ['group' => 'leaves', 'name' => 'apply_leave', 'title' => 'Apply leave', 'guard_name' => 'web'],
            ['group' => 'leaves', 'name' => 'approve_leave', 'title' => 'Approve leave', 'guard_name' => 'web'],

            // leaves
            ['group' => 'sick_leaves', 'name' => 'view_sick_leaves', 'title' => 'View sick leaves', 'guard_name' => 'web'],
            ['group' => 'sick_leaves', 'name' => 'apply_sick_leave', 'title' => 'Apply sick leave', 'guard_name' => 'web'],
            ['group' => 'sick_leaves', 'name' => 'approve_sick_leave', 'title' => 'Approve sick leave', 'guard_name' => 'web'],

            // locations
            ['group' => 'locations', 'name' => 'view_locations', 'title' => 'View Locations', 'guard_name' => 'web'],
            ['group' => 'locations', 'name' => 'add_location', 'title' => 'Add Location', 'guard_name' => 'web'],
            ['group' => 'locations', 'name' => 'edit_location', 'title' => 'Edit Location', 'guard_name' => 'web'],
            // ['group' => 'locations', 'name' => 'delete_location', 'title' => 'Delete Location', 'guard_name' => 'web'],

            // Working Hours
            ['group' => 'work', 'name' => 'view_working_hours', 'title' => 'View Working Hours', 'guard_name' => 'web'],
            ['group' => 'work', 'name' => 'add_working_hours', 'title' => 'Add Working Hours', 'guard_name' => 'web'],
            ['group' => 'work', 'name' => 'edit_working_hours', 'title' => 'Edit Working Hours', 'guard_name' => 'web'],
            ['group' => 'work', 'name' => 'delete_working_hours', 'title' => 'Delete Working Hours', 'guard_name' => 'web'],
        ];
        
        Permission::insert($permissions);
    }
}
