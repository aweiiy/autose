<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transmissions = array(
            array('id' => '1','name' => 'Automatic transmission','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Semi-automatic','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Manual gearbox','created_at' => NULL,'updated_at' => NULL),
        );
        foreach ($transmissions as $item) {
            DB::table('transmissions')->insert($item);
        }
    }
}
