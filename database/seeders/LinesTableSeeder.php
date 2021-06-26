<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lines')->delete();
        
        \DB::table('lines')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 1,
                'name' => 'المنصورة - القاهرة',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'id' => 2,
                'name' => 'القاهرة - المنصورة',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}