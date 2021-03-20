<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        // $user->phonenumber = '0123456789';
        $user->email = 'admin@gmail.com';
        // $user->status = 'active';
        $user->password = Hash::make('admin@123');
        $user->save();
    }
}
