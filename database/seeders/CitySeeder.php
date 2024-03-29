<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array('id' => '1','name' => 'Akmenė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Alytus','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Anykščiai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Ariogala','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'Baltoji Vokė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'Birštonas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => 'Biržai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => 'Daugai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','name' => 'Druskininkai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','name' => 'Dūkštas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','name' => 'Dusetos','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','name' => 'Eišiškės','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','name' => 'Elektrėnai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','name' => 'Ežerėlis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','name' => 'Gargždai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','name' => 'Garliava','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','name' => 'Gelgaudiškis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','name' => 'Grigiškės','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','name' => 'Ignalina','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','name' => 'Jieznas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','name' => 'Jonava','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','name' => 'Joniškėlis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','name' => 'Joniškis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','name' => 'Jurbarkas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','name' => 'Kaišiadorys','created_at' => NULL,'updated_at' => NULL),
            array('id' => '26','name' => 'Kalvarija','created_at' => NULL,'updated_at' => NULL),
            array('id' => '27','name' => 'Kaunas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '28','name' => 'Kavarskas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '29','name' => 'Kazlų Rūda','created_at' => NULL,'updated_at' => NULL),
            array('id' => '30','name' => 'Kėdainiai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '31','name' => 'Kelmė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '32','name' => 'Kybartai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '33','name' => 'Klaipėda','created_at' => NULL,'updated_at' => NULL),
            array('id' => '34','name' => 'Kretinga','created_at' => NULL,'updated_at' => NULL),
            array('id' => '35','name' => 'Kudirkos Naumiestis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '36','name' => 'Kupiškis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '37','name' => 'Kuršėnai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '38','name' => 'Lazdijai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '39','name' => 'Lentvaris','created_at' => NULL,'updated_at' => NULL),
            array('id' => '40','name' => 'Linkuva','created_at' => NULL,'updated_at' => NULL),
            array('id' => '41','name' => 'Marijampolė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '42','name' => 'Mažeikiai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '43','name' => 'Molėtai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '44','name' => 'Naujoji Akmenė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '45','name' => 'Nemenčinė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '46','name' => 'Neringa','created_at' => NULL,'updated_at' => NULL),
            array('id' => '47','name' => 'Nida','created_at' => NULL,'updated_at' => NULL),
            array('id' => '48','name' => 'Obeliai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '49','name' => 'Pabradė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '50','name' => 'Pagėgiai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '51','name' => 'Pakruojis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '52','name' => 'Palanga','created_at' => NULL,'updated_at' => NULL),
            array('id' => '53','name' => 'Pandėlys','created_at' => NULL,'updated_at' => NULL),
            array('id' => '54','name' => 'Panemunė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '55','name' => 'Panevėžys','created_at' => NULL,'updated_at' => NULL),
            array('id' => '56','name' => 'Pasvalys','created_at' => NULL,'updated_at' => NULL),
            array('id' => '57','name' => 'Plungė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '58','name' => 'Priekulė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '59','name' => 'Prienai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '60','name' => 'Radviliškis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '61','name' => 'Ramygala','created_at' => NULL,'updated_at' => NULL),
            array('id' => '62','name' => 'Raseiniai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '63','name' => 'Rietavas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '64','name' => 'Rokiškis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '65','name' => 'Rūdiškės','created_at' => NULL,'updated_at' => NULL),
            array('id' => '66','name' => 'Salantai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '67','name' => 'Seda','created_at' => NULL,'updated_at' => NULL),
            array('id' => '68','name' => 'Simnas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '69','name' => 'Skaudvilė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '70','name' => 'Skuodas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '71','name' => 'Smalininkai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '72','name' => 'Subačius','created_at' => NULL,'updated_at' => NULL),
            array('id' => '73','name' => 'Šakiai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '74','name' => 'Šalčininkai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '75','name' => 'Šeduva','created_at' => NULL,'updated_at' => NULL),
            array('id' => '76','name' => 'Šiauliai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '77','name' => 'Šilalė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '78','name' => 'Šilutė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '79','name' => 'Širvintos','created_at' => NULL,'updated_at' => NULL),
            array('id' => '80','name' => 'Švenčionėliai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '81','name' => 'Švenčionys','created_at' => NULL,'updated_at' => NULL),
            array('id' => '82','name' => 'Tauragė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '83','name' => 'Telšiai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '84','name' => 'Tytuvėnai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '85','name' => 'Trakai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '86','name' => 'Troškūnai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '87','name' => 'Ukmergė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '88','name' => 'Utena','created_at' => NULL,'updated_at' => NULL),
            array('id' => '89','name' => 'Užventis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '90','name' => 'Vabalninkas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '91','name' => 'Varėna','created_at' => NULL,'updated_at' => NULL),
            array('id' => '92','name' => 'Varniai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '93','name' => 'Veisiejai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '94','name' => 'Venta','created_at' => NULL,'updated_at' => NULL),
            array('id' => '95','name' => 'Viekšniai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '96','name' => 'Vievis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '97','name' => 'Vilkaviškis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '98','name' => 'Vilkija','created_at' => NULL,'updated_at' => NULL),
            array('id' => '99','name' => 'Vilnius','created_at' => NULL,'updated_at' => NULL),
            array('id' => '100','name' => 'Virbalis','created_at' => NULL,'updated_at' => NULL),
            array('id' => '101','name' => 'Visaginas','created_at' => NULL,'updated_at' => NULL),
            array('id' => '102','name' => 'Zarasai','created_at' => NULL,'updated_at' => NULL),
            array('id' => '103','name' => 'Žagarė','created_at' => NULL,'updated_at' => NULL),
            array('id' => '104','name' => 'Žiežmariai','created_at' => NULL,'updated_at' => NULL)
        );
        foreach ($cities as $item) {
            DB::table('cities')->insert($item);
        }
    }
}
