<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('trips')->delete();

        \DB::table('trips')->insert(array (
            0 =>
            array (
                'bus_id' => 1,
                'created_at' => NULL,
                'date' => '2021-06-26 16:18:26',
                'id' => 1,
                'line_id' => 1,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'bus_id' => 1,
                'created_at' => NULL,
                'date' => '2021-06-26 16:18:26',
                'id' => 2,
                'line_id' => 2,
                'updated_at' => NULL,
            ),
          2=>  array (
                'bus_id' => 1,
                'created_at' => NULL,
                'date' => '2021-06-27 16:18:26',
                'id' => 3,
                'line_id' => 1,
                'updated_at' => NULL,
            ),
          3=>  array (
                'bus_id' => 1,
                'created_at' => NULL,
                'date' => '2021-06-28 16:18:26',
                'id' => 4,
                'line_id' => 1,
                'updated_at' => NULL,
            ),
        ));


    }
}
