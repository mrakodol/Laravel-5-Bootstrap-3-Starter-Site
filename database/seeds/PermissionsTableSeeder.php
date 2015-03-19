<?php


use App\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = array(
            array( // 1
                'name' => 'manage_language',
                'display_name' => 'Manage languages',
                'is_admin' => 1
            ),
            array( // 2
                'name' => 'manage_article_categories',
                'display_name' => 'Manage news category',
                'is_admin' => 1
            ),
            array( // 3
                'name' => 'manage_news',
                'display_name' => 'Manage news',
                'is_admin' => 1
            ),
            array( // 4
                'name' => 'manage_video_album',
                'display_name' => 'Manage video album',
                'is_admin' => 1
            ),
            array( // 5
                'name' => 'manage_video',
                'display_name' => 'Manage video',
                'is_admin' => 1
            ),
            array( // 6
                'name' => 'manage_photo_album',
                'display_name' => 'Manage photo album',
                'is_admin' => 1
            ),
            array( // 7
                'name' => 'manage_photo',
                'display_name' => 'Manage photo',
                'is_admin' => 1
            ),
            array( // 8
                'name' => 'manage_users',
                'display_name' => 'Manage users',
                'is_admin' => 1
            ),
            array( // 9
                'name' => 'manage_roles',
                'display_name' => 'Manage roles',
                'is_admin' => 1
            ),
        );


        foreach ($permissions as $row) {
            $row = array_merge($row, ['created_at' => new DateTime, 'updated_at' => new DateTime]);
            DB::table('permissions')->insert($row);
        }

        DB::table('permission_role')->delete();

        $role_id_admin = Role::where('name', '=', 'admin')->first()->id;
        $permission_base = (int)DB::table('permissions')->first()->id - 1;

        $permissions = array(
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 1
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 2
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 3
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 4
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 5
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 6
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 7
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 8
            ),
            array(
                'role_id' => $role_id_admin,
                'permission_id' => $permission_base + 9
            ),
        );

        foreach ($permissions as $row) {
            $row = array_merge($row, ['created_at' => new DateTime, 'updated_at' => new DateTime]);
            DB::table('permission_role')->insert($row);
        }


    }

}