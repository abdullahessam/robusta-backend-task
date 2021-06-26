<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'email' => 'test@test.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'test1',
                'password' => '123',
                'remember_token' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'email' => 'test2@test.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'name' => 'test2',
                'password' => '123',
                'remember_token' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'email' => 'test3@test.com',
                'email_verified_at' => NULL,
                'id' => 3,
                'name' => 'test3',
                'password' => '123',
                'remember_token' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}