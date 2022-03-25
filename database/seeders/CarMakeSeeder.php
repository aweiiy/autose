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
        $car_make = array(
            array('id' => '1','name' => 'Acura','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Alfa Romeo','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'AMC','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Aston Martin','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'Audi','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'Avanti','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => 'Bentley','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => 'BMW','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','name' => 'Buick','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','name' => 'Cadillac','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','name' => 'Chevrolet','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','name' => 'Chrysler','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','name' => 'Daewoo','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','name' => 'Daihatsu','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','name' => 'Datsun','created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','name' => 'DeLorean','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','name' => 'Dodge','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','name' => 'Eagle','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','name' => 'Ferrari','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','name' => 'FIAT','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','name' => 'Fisker','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','name' => 'Ford','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','name' => 'Freightliner','created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','name' => 'Geo','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','name' => 'GMC','created_at' => NULL,'updated_at' => NULL),
            array('id' => '26','name' => 'Honda','created_at' => NULL,'updated_at' => NULL),
            array('id' => '27','name' => 'HUMMER','created_at' => NULL,'updated_at' => NULL),
            array('id' => '28','name' => 'Hyundai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '29','name' => 'Infiniti','created_at' => NULL,'updated_at' => NULL),
            array('id' => '30','name' => 'Isuzu','created_at' => NULL,'updated_at' => NULL),
            array('id' => '31','name' => 'Jaguar','created_at' => NULL,'updated_at' => NULL),
            array('id' => '32','name' => 'Jeep','created_at' => NULL,'updated_at' => NULL),
            array('id' => '33','name' => 'Kia','created_at' => NULL,'updated_at' => NULL),
            array('id' => '34','name' => 'Lamborghini','created_at' => NULL,'updated_at' => NULL),
            array('id' => '35','name' => 'Lancia','created_at' => NULL,'updated_at' => NULL),
            array('id' => '36','name' => 'Land Rover','created_at' => NULL,'updated_at' => NULL),
            array('id' => '37','name' => 'Lexus','created_at' => NULL,'updated_at' => NULL),
            array('id' => '38','name' => 'Lincoln','created_at' => NULL,'updated_at' => NULL),
            array('id' => '39','name' => 'Lotus','created_at' => NULL,'updated_at' => NULL),
            array('id' => '40','name' => 'Maserati','created_at' => NULL,'updated_at' => NULL),
            array('id' => '41','name' => 'Maybach','created_at' => NULL,'updated_at' => NULL),
            array('id' => '42','name' => 'Mazda','created_at' => NULL,'updated_at' => NULL),
            array('id' => '43','name' => 'McLaren','created_at' => NULL,'updated_at' => NULL),
            array('id' => '44','name' => 'Mercedes-Benz','created_at' => NULL,'updated_at' => NULL),
            array('id' => '45','name' => 'Mercury','created_at' => NULL,'updated_at' => NULL),
            array('id' => '46','name' => 'Merkur','created_at' => NULL,'updated_at' => NULL),
            array('id' => '47','name' => 'MINI','created_at' => NULL,'updated_at' => NULL),
            array('id' => '48','name' => 'Mitsubishi','created_at' => NULL,'updated_at' => NULL),
            array('id' => '49','name' => 'Nissan','created_at' => NULL,'updated_at' => NULL),
            array('id' => '50','name' => 'Oldsmobile','created_at' => NULL,'updated_at' => NULL),
            array('id' => '51','name' => 'Peugeot','created_at' => NULL,'updated_at' => NULL),
            array('id' => '52','name' => 'Plymouth','created_at' => NULL,'updated_at' => NULL),
            array('id' => '53','name' => 'Pontiac','created_at' => NULL,'updated_at' => NULL),
            array('id' => '54','name' => 'Porsche','created_at' => NULL,'updated_at' => NULL),
            array('id' => '55','name' => 'RAM','created_at' => NULL,'updated_at' => NULL),
            array('id' => '56','name' => 'Renault','created_at' => NULL,'updated_at' => NULL),
            array('id' => '57','name' => 'Rolls-Royce','created_at' => NULL,'updated_at' => NULL),
            array('id' => '58','name' => 'Saab','created_at' => NULL,'updated_at' => NULL),
            array('id' => '59','name' => 'Saturn','created_at' => NULL,'updated_at' => NULL),
            array('id' => '60','name' => 'Scion','created_at' => NULL,'updated_at' => NULL),
            array('id' => '61','name' => 'smart','created_at' => NULL,'updated_at' => NULL),
            array('id' => '62','name' => 'SRT','created_at' => NULL,'updated_at' => NULL),
            array('id' => '63','name' => 'Sterling','created_at' => NULL,'updated_at' => NULL),
            array('id' => '64','name' => 'Subaru','created_at' => NULL,'updated_at' => NULL),
            array('id' => '65','name' => 'Suzuki','created_at' => NULL,'updated_at' => NULL),
            array('id' => '66','name' => 'Tesla','created_at' => NULL,'updated_at' => NULL),
            array('id' => '67','name' => 'Toyota','created_at' => NULL,'updated_at' => NULL),
            array('id' => '68','name' => 'Triumph','created_at' => NULL,'updated_at' => NULL),
            array('id' => '69','name' => 'Volkswagen','created_at' => NULL,'updated_at' => NULL),
            array('id' => '70','name' => 'Volvo','created_at' => NULL,'updated_at' => NULL),
            array('id' => '71','name' => 'Yugo','created_at' => NULL,'updated_at' => NULL)
        );
        foreach ($car_make as $item) {
            DB::table('car_make')->insert($item);
        }
    }
}
