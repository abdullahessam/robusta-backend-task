<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LineCitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('line_cities')->delete();
        
        \DB::table('line_cities')->insert(array (
            0 => 
            array (
                'city_id' => 1,
                'created_at' => NULL,
                'id' => 1,
                'line_id' => 1,
                'order' => 1,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'city_id' => 2,
                'created_at' => NULL,
                'id' => 3,
                'line_id' => 1,
                'order' => 2,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'city_id' => 4,
                'created_at' => NULL,
                'id' => 4,
                'line_id' => 1,
                'order' => 4,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'city_id' => 4,
                'created_at' => NULL,
                'id' => 5,
                'line_id' => 2,
                'order' => 1,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'city_id' => 3,
                'created_at' => NULL,
                'id' => 6,
                'line_id' => 2,
                'order' => 2,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'city_id' => 2,
                'created_at' => NULL,
                'id' => 7,
                'line_id' => 2,
                'order' => 3,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'city_id' => 1,
                'created_at' => NULL,
                'id' => 8,
                'line_id' => 2,
                'order' => 4,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'city_id' => 3,
                'created_at' => NULL,
                'id' => 9,
                'line_id' => 1,
                'order' => 3,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}