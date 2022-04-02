<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wishlists = array(
            array('id' => '1','user_id' => '17','name' => 'Audi A5 2019','car_listing_id' => '72','price' => '1950','created_at' => '2022-03-31 12:28:01','updated_at' => '2022-03-31 12:28:01'),
            array('id' => '2','user_id' => '17','name' => 'Bentley Continental 2022','car_listing_id' => '76','price' => '350000','created_at' => '2022-03-31 12:28:06','updated_at' => '2022-03-31 12:28:06'),
            array('id' => '6','user_id' => '17','name' => 'Toyota Camry 2019','car_listing_id' => '86','price' => '32000','created_at' => '2022-03-31 12:42:21','updated_at' => '2022-03-31 12:42:21'),
            array('id' => '15','user_id' => '25','name' => 'Volkswagen Golf 2017','car_listing_id' => '78','price' => '10500','created_at' => '2022-03-31 13:18:41','updated_at' => '2022-03-31 13:18:41'),
            array('id' => '17','user_id' => '25','name' => 'Toyota Camry 2019','car_listing_id' => '87','price' => '32000','created_at' => '2022-03-31 15:57:45','updated_at' => '2022-03-31 15:57:45'),
            array('id' => '19','user_id' => '25','name' => 'BMW 318i 2019','car_listing_id' => '89','price' => '1000','created_at' => '2022-03-31 16:52:50','updated_at' => '2022-03-31 16:52:50'),
            array('id' => '48','user_id' => '25','name' => 'Porsche 911 2020','car_listing_id' => '77','price' => '245000','created_at' => '2022-03-31 17:05:38','updated_at' => '2022-03-31 17:05:38'),
            array('id' => '49','user_id' => '25','name' => 'Bentley Continental 2022','car_listing_id' => '76','price' => '350000','created_at' => '2022-03-31 17:13:46','updated_at' => '2022-03-31 17:13:46'),
            array('id' => '50','user_id' => '25','name' => 'Audi A5 2019','car_listing_id' => '72','price' => '1900','created_at' => '2022-03-31 17:13:51','updated_at' => '2022-03-31 17:13:51'),
            array('id' => '51','user_id' => '17','name' => 'Porsche 911 2020','car_listing_id' => '77','price' => '245000','created_at' => '2022-04-01 09:52:58','updated_at' => '2022-04-01 09:52:58'),
            array('id' => '54','user_id' => '16','name' => 'Bentley Continental 2022','car_listing_id' => '76','price' => '350000','created_at' => '2022-04-01 10:12:55','updated_at' => '2022-04-01 10:12:55'),
            array('id' => '57','user_id' => '16','name' => 'Volkswagen Passat 2019','car_listing_id' => '90','price' => '100000','created_at' => '2022-04-01 10:15:33','updated_at' => '2022-04-01 10:15:33'),
            array('id' => '58','user_id' => '16','name' => 'Porsche 911 2020','car_listing_id' => '77','price' => '245000','created_at' => '2022-04-01 10:20:36','updated_at' => '2022-04-01 10:20:36'),
            array('id' => '60','user_id' => '27','name' => 'Audi A5 2019','car_listing_id' => '72','price' => '1900','created_at' => '2022-04-01 17:20:35','updated_at' => '2022-04-01 17:20:35')
        );

        foreach ($wishlists as $item) {
            DB::table('wishlists')->insert($item);
        }
    }
}
