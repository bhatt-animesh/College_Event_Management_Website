<?php

use Illuminate\Database\Seeder;
// use App\Role;
// use App\Permission;
use App\User;

class SetupAppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = new Role();
        // $admin->name = "admin";
        // $admin->display_name = "Admin";
        // $admin->description = "User is Admin ";
        // $admin->save();

        // $user = new Role();
        // $user->name = "user";
        // $user->display_name = "User";
        // $user->description = "User ";
        // $user->save();

        // $createUser = new Permission();
        // $createUser->name = "create-users";
        // $createUser->display_name = "Create Users";
        // $createUser->description = "Create New Users";
        // $createUser->save();

        // $editUser = new Permission();
        // $editUser->name = "edit-users";
        // $editUser->display_name = "Edit Users";
        // $editUser->description = "Edit Users";
        // $editUser->save();

        // $deleteUser = new Permission();
        // $deleteUser->name = "delete-users";
        // $deleteUser->display_name = "Delete Users";
        // $deleteUser->description = "Delete Users";
        // $deleteUser->save();

        $user = new User();
        $user->name = 'admin';
        // $user->phonenumber = '0123456789';
        $user->email = 'admin@gmail.com';
        // $user->status = 'active';
        $user->password = Hash::make('admin@123');
        $user->save();

        // $admin->attachPermissions(array($createUser, $editUser, $deleteUser));
        // $user->attachRole($admin);
    }
}
