<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('reservations')->delete();

        \DB::table('reservations')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'destination_city_id' => 2,
                'destination_city_order' => 2,
                'dispatch_city_id' => 1,
                'dispatch_city_order' => 1,
                'id' => 1,
                'seat_no' => 1,
                'trip_id' => 1,
                'updated_at' => NULL,
                'user_name' => 'ahmed',
            ),
            1 =>
            array (
                'created_at' => NULL,
                'destination_city_id' => 4,
                'destination_city_order' => 4,
                'dispatch_city_id' => 1,
                'dispatch_city_order' => 1,
                'id' => 2,
                'seat_no' => 2,
                'trip_id' => 1,
                'updated_at' => NULL,
                'user_name' => 'sayed',
            ),
            2 =>
            array (
                'created_at' => NULL,
                'destination_city_id' => 4,
                'destination_city_order' => 4,
                'dispatch_city_id' => 3,
                'dispatch_city_order' => 3,
                'id' => 3,
                'seat_no' => 3,
                'trip_id' => 1,
                'updated_at' => NULL,
                'user_name' => 'abdullah',
            ),
        ));


    }
}
