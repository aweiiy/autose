<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Audi'],
            ['title' => 'BMW'],
            ['title' => 'Volkswagen']
        ];
        foreach ($items as $item) {
            DB::table('car_make')->insert($item);
        }
    }
}
