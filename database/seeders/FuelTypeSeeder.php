<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fuel_type = array(
            array('id' => '1','name' => 'Diesel','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Petrol','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Hybrid (petrol/electric)','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Hybrid (diesel/electric)','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'Electric','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'Other','created_at' => NULL,'updated_at' => NULL)
        );
        foreach ($fuel_type as $item) {
            DB::table('fuel_type')->insert($item);
        }
    }
}
