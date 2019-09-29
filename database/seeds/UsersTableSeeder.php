<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Seed with Admin and Manager User Acounts database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create an Admin User Account
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'password' => bcrypt('password'),
            'type' => 'admin',
            
        ]);


        //Create a Manager User Acccount
        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager@site.com',
            'password' => bcrypt('password'),
            'type' => 'manager'
        ]);

        
    }
}
