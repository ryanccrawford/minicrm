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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'password' => bcrypt('password'),
            'remember_token' => null

        ]);


        //Create a Manager User Acccount
        User::create([
            'name' => 'Manager',
            'email' => 'manager@site.com',
            'password' => bcrypt('password'),
            'remember_token' => null
        ]);
    }
}
