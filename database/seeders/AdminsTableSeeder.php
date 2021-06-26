<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'created_at' => '2021-06-26 23:02:03',
                'email' => 'admin@admin.com',
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$gT1P9URNZ7zzZPFEIedONe6whB0eNduI4irHBv8nqhLgbhoK8Eh3e',
                'remember_token' => NULL,
                'updated_at' => '2021-06-26 23:03:20',
            ),
        ));
        
        
    }
}