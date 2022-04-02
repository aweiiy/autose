<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = array(
            array('id' => '256','car_listing_id' => '72','name' => '72-image-1648571232736.jpg','created_at' => '2022-03-29 16:27:12','updated_at' => '2022-03-29 16:27:12'),
            array('id' => '257','car_listing_id' => '72','name' => '72-image-1648571232125.jpg','created_at' => '2022-03-29 16:27:12','updated_at' => '2022-03-29 16:27:12'),
            array('id' => '262','car_listing_id' => '76','name' => '76-image-1648641306887.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '263','car_listing_id' => '76','name' => '76-image-164864130612.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '264','car_listing_id' => '76','name' => '76-image-164864130697.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '265','car_listing_id' => '76','name' => '76-image-1648641306981.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '266','car_listing_id' => '77','name' => '77-image-1648641410657.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '267','car_listing_id' => '77','name' => '77-image-1648641410157.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '268','car_listing_id' => '77','name' => '77-image-1648641410870.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '269','car_listing_id' => '77','name' => '77-image-1648641410351.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '270','car_listing_id' => '77','name' => '77-image-1648641410588.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '271','car_listing_id' => '77','name' => '77-image-1648641410516.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '272','car_listing_id' => '78','name' => '78-image-1648641515554.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '273','car_listing_id' => '78','name' => '78-image-1648641515307.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '274','car_listing_id' => '78','name' => '78-image-1648641515247.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '275','car_listing_id' => '78','name' => '78-image-1648641515928.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '276','car_listing_id' => '79','name' => '79-image-1648641603483.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '277','car_listing_id' => '79','name' => '79-image-164864160384.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '278','car_listing_id' => '79','name' => '79-image-1648641603968.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '279','car_listing_id' => '79','name' => '79-image-1648641603108.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '280','car_listing_id' => '79','name' => '79-image-1648641603653.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '281','car_listing_id' => '79','name' => '79-image-1648641603284.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '282','car_listing_id' => '80','name' => '80-image-1648641705642.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '283','car_listing_id' => '80','name' => '80-image-1648641705532.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '284','car_listing_id' => '80','name' => '80-image-164864170550.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '285','car_listing_id' => '80','name' => '80-image-1648641705575.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '286','car_listing_id' => '80','name' => '80-image-1648641705397.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '287','car_listing_id' => '81','name' => '81-image-164864179095.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '288','car_listing_id' => '81','name' => '81-image-1648641790515.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '289','car_listing_id' => '81','name' => '81-image-1648641790663.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '290','car_listing_id' => '81','name' => '81-image-1648641790354.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '291','car_listing_id' => '81','name' => '81-image-1648641790810.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '292','car_listing_id' => '81','name' => '81-image-1648641790354.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '293','car_listing_id' => '81','name' => '81-image-1648641790564.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '298','car_listing_id' => '91','name' => '91-image-1648836171928.jpg','created_at' => '2022-04-01 18:02:51','updated_at' => '2022-04-01 18:02:51')
        );

        foreach ($images as $item) {
            DB::table('images')->insert($item);
        }
    }
}
