<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_body_type = array(
            array('id' => '1','name' => 'Sedan','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Coupe','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Hatchback','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'SUV','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'Station Wagon','created_at' => NULL,'updated_at' => NULL)
        );
        foreach ($car_body_type as $item) {
            DB::table('car_body_type')->insert($item);
        }
    }
}
