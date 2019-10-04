<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed with Admin and Manager User Acounts
     *
     * @return void
     */
    public function run()
    {
        //Create an Admin User Account
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'password' => bcrypt('password')
        ]);
        //Create a Manager User Acccount
        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager@site.com',
            'password' => bcrypt('password')
        ]);
    }
}
