<?php

use App\User;
use App\Role;
use App\AssignedRoles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->is_admin = 1;
        $adminRole->save();

        $commentRole = new Role;
        $commentRole->name = 'comment';
        $commentRole->is_admin = 0;
        $commentRole->save();

        $user = User::where('email','=','admin@admin.com')->first();
        $assignedrole = new AssignedRoles;
        $assignedrole->user_id = $user->id;
        $assignedrole->role_id = $adminRole->id;
        $assignedrole->save();

        $user = User::where('email','=','user@user.com')->first();
        $assignedrole = new AssignedRoles;
        $assignedrole->user_id = $user->id;
        $assignedrole->role_id = $commentRole->id;
        $assignedrole->save();
    }

}
