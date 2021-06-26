<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buses')->delete();
        
        \DB::table('buses')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 1,
                'name' => 'bus no 1',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}