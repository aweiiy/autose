<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_listing = array(
            array('id' => '72','user_id' => '2','car_make_id' => '5','car_model_id' => '54','car_body_type_id' => '1','city_id' => '13','fuel_type_id' => '1','cubic_capacity' => '2000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'adasd','year' => '2019','mileage' => '10000','engine_power' => '200','vin' => 'WAUEFAFLXEA043867','price' => '1900','phone_number' => '62083405','email' => 'a@a','created_at' => '2022-03-29 16:27:12','updated_at' => '2022-03-31 12:43:28'),
            array('id' => '76','user_id' => '2','car_make_id' => '7','car_model_id' => '87','car_body_type_id' => '2','city_id' => '99','fuel_type_id' => '2','cubic_capacity' => '6000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'Boiling body color
Alloy wheels, black
Newmarket Tan and Cumbrian Green split interior
Front seat comfort package
Contrasting seams
Sport pedals
Touring package
Mood Lighting package
LED "Trust Me" light
Fresh air intake system
Bang & Olufsen audio system
Telephone charging system
Bentley rotating screen
Panoramic Roof','year' => '2022','mileage' => '100','engine_power' => '485','vin' => 'SCBBS9ZA0D0016680','price' => '350000','phone_number' => '69416623','email' => 'david@gmail.com','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '77','user_id' => '2','car_make_id' => '54','car_model_id' => '1110','car_body_type_id' => '2','city_id' => '70','fuel_type_id' => '2','cubic_capacity' => '3800','battery_capacity' => NULL,'transmission_id' => '1','description' => '~ PORSCHE 911 992 TURBO S COUPE

~ ENGINE: 3.7L GASOLINE 478KW

~ AGATE GRAY METALLIK COLOUR
~ BLACK/BEIGE MOJAVE INTERIOR

~ 20-/21-INCH 911 TURBO S EXCLUSIVE DESIGN WHEELS','year' => '2020','mileage' => '14500','engine_power' => '478','vin' => 'WP0BA29993S304584','price' => '245000','phone_number' => '55653251','email' => 'david@gmail.com','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '78','user_id' => '2','car_make_id' => '69','car_model_id' => '1272','car_body_type_id' => '4','city_id' => '43','fuel_type_id' => '1','cubic_capacity' => '1600','battery_capacity' => NULL,'transmission_id' => '3','description' => 'Runs and drives','year' => '2017','mileage' => '200000','engine_power' => '81','vin' => 'WVWAA63B9WE390383','price' => '10500','phone_number' => '62084988','email' => 'david@gmail.com','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '79','user_id' => '2','car_make_id' => '67','car_model_id' => '1254','car_body_type_id' => '4','city_id' => '60','fuel_type_id' => '3','cubic_capacity' => '1500','battery_capacity' => '1','transmission_id' => '1','description' => 'Good toyota','year' => '2017','mileage' => '180000','engine_power' => '80','vin' => 'W0LBE6EE3HG158223','price' => '9000','phone_number' => '62846844','email' => 'david@gmail.com','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '80','user_id' => '2','car_make_id' => '5','car_model_id' => '54','car_body_type_id' => '1','city_id' => '69','fuel_type_id' => '1','cubic_capacity' => '3000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'aaa','year' => '2017','mileage' => '152000','engine_power' => '170','vin' => 'WAUEFAFLXEA043867','price' => '12000','phone_number' => '62841111','email' => 'david@gmail.com','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '81','user_id' => '2','car_make_id' => '67','car_model_id' => '1224','car_body_type_id' => '1','city_id' => '63','fuel_type_id' => '3','cubic_capacity' => '2500','battery_capacity' => '10','transmission_id' => '1','description' => NULL,'year' => '2019','mileage' => '10000','engine_power' => '150','vin' => 'WTUEFAFLXEA043867','price' => '32000','phone_number' => '62097116','email' => 'david@gmail.com','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '91','user_id' => '17','car_make_id' => '3','car_model_id' => '35','car_body_type_id' => '1','city_id' => '4','fuel_type_id' => '1','cubic_capacity' => '1000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'aa','year' => '2006','mileage' => '100','engine_power' => '100','vin' => 'W0LBE6EE3HG158223','price' => '30000','phone_number' => '62078448','email' => 'a@a','created_at' => '2022-04-01 18:02:51','updated_at' => '2022-04-01 18:02:51')
        );
        foreach ($car_listing as $item) {
            DB::table('car_listing')->insert($item);
        }

    }
}
