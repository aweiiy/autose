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
            array('id' => '72','user_id' => '2','car_make_id' => '5','car_model_id' => '54','car_body_type_id' => '1','city_id' => '13','fuel_type_id' => '1','cubic_capacity' => '2000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'adasd','year' => '2019','mileage' => '10000','engine_power' => '200','vin' => 'WAUEFAFLXEA043867','price' => '19000','phone_number' => '62083405','email' => 'a@a','created_at' => '2022-03-29 16:27:12','updated_at' => '2022-04-06 16:32:13'),
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
            array('id' => '78','user_id' => '2','car_make_id' => '69','car_model_id' => '1272','car_body_type_id' => '4','city_id' => '43','fuel_type_id' => '1','cubic_capacity' => '1600','battery_capacity' => NULL,'transmission_id' => '3','description' => 'Runs and drives','year' => '2017','mileage' => '200000','engine_power' => '81','vin' => 'WVWAA63B9WE390383','price' => '11000','phone_number' => '62084988','email' => 'david@gmail.com','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-04-05 11:55:07'),
            array('id' => '79','user_id' => '2','car_make_id' => '67','car_model_id' => '1254','car_body_type_id' => '4','city_id' => '60','fuel_type_id' => '3','cubic_capacity' => '1500','battery_capacity' => '1','transmission_id' => '3','description' => 'Good toyota','year' => '2017','mileage' => '180000','engine_power' => '80','vin' => 'W0LBE6EE3HG158223','price' => '9000','phone_number' => '62846844','email' => 'a@a','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-04-03 13:35:27'),
            array('id' => '80','user_id' => '2','car_make_id' => '5','car_model_id' => '54','car_body_type_id' => '1','city_id' => '69','fuel_type_id' => '1','cubic_capacity' => '3000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'aaa','year' => '2017','mileage' => '152000','engine_power' => '170','vin' => 'WAUEFAFLXEA043867','price' => '12000','phone_number' => '62841111','email' => 'david@gmail.com','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '81','user_id' => '2','car_make_id' => '67','car_model_id' => '1224','car_body_type_id' => '1','city_id' => '63','fuel_type_id' => '3','cubic_capacity' => '2500','battery_capacity' => '10','transmission_id' => '1','description' => NULL,'year' => '2019','mileage' => '10000','engine_power' => '150','vin' => 'WTUEFAFLXEA043867','price' => '32000','phone_number' => '62097116','email' => 'david@gmail.com','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '92','user_id' => '17','car_make_id' => '69','car_model_id' => '1272','car_body_type_id' => '4','city_id' => '4','fuel_type_id' => '2','cubic_capacity' => '1800','battery_capacity' => NULL,'transmission_id' => '1','description' => 'VW golf, everything works.','year' => '2015','mileage' => '130000','engine_power' => '125','vin' => NULL,'price' => '12500','phone_number' => '62078448','email' => 'a@a','created_at' => '2022-04-04 19:54:57','updated_at' => '2022-04-05 18:06:55'),
            array('id' => '93','user_id' => '28','car_make_id' => '69','car_model_id' => '1275','car_body_type_id' => '6','city_id' => '17','fuel_type_id' => '2','cubic_capacity' => '1800','battery_capacity' => NULL,'transmission_id' => '1','description' => 'LT ENG RUS
VIBER
WHATSUPP','year' => '2014','mileage' => '75000','engine_power' => '125','vin' => '1VWAT7A3XEC038464','price' => '6000','phone_number' => '62066799','email' => 'user111@gmail.com','created_at' => '2022-04-06 15:55:51','updated_at' => '2022-04-06 15:55:51'),
            array('id' => '94','user_id' => '28','car_make_id' => '22','car_model_id' => '472','car_body_type_id' => '1','city_id' => '27','fuel_type_id' => '2','cubic_capacity' => '1500','battery_capacity' => NULL,'transmission_id' => '1','description' => 'Real mileage !!!
The car is maintained and runs flawlessly, we can check it at any service center of your choice. Very well equipped car with European navigation.','year' => '2015','mileage' => '80000','engine_power' => '135','vin' => NULL,'price' => '9500','phone_number' => '65794133','email' => 'user111@gmail.com','created_at' => '2022-04-06 16:01:53','updated_at' => '2022-04-06 16:01:53'),
            array('id' => '95','user_id' => '28','car_make_id' => '44','car_model_id' => '846','car_body_type_id' => '6','city_id' => '27','fuel_type_id' => '1','cubic_capacity' => '2000','battery_capacity' => NULL,'transmission_id' => '1','description' => NULL,'year' => '2014','mileage' => '230000','engine_power' => '130','vin' => NULL,'price' => '10000','phone_number' => '66918698','email' => 'user111@gmail.com','created_at' => '2022-04-06 16:03:40','updated_at' => '2022-04-06 16:03:40'),
            array('id' => '96','user_id' => '28','car_make_id' => '8','car_model_id' => '135','car_body_type_id' => '6','city_id' => '77','fuel_type_id' => '1','cubic_capacity' => '3000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'Sport heated leather interior. Sport 8 in the box. M R19 alloy wheels. Xenon headlights. Distronic. Blind zone. Line Assistant Light Assistant. Road sign recognition. Black ceiling. Logic7 music. Rear camera. Partronics. Heated, folding mirrors. Rear window curtains. Sport / EcoPro / Comfort / Comfort + modes.','year' => '2012','mileage' => '380000','engine_power' => '190','vin' => NULL,'price' => '11000','phone_number' => '69062554','email' => 'user111@gmail.com','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '97','user_id' => '17','car_make_id' => '5','car_model_id' => '54','car_body_type_id' => '6','city_id' => '64','fuel_type_id' => '1','cubic_capacity' => '2000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'I am selling a completely tidy car. Almost all the advantages such as line assistant, radar distance control saloon, seat seats, Bang Olufsen audio, black ceiling, electric driver\'s seat, etc. you don\'t need to check anything at your chosen service center. Now with black wheels and rim tires. Electric luggage rack. Autonomous heating with remote control','year' => '2012','mileage' => '280000','engine_power' => '105','vin' => NULL,'price' => '9500','phone_number' => '67131716','email' => 'a@a','created_at' => '2022-04-06 16:09:20','updated_at' => '2022-04-06 16:09:20'),
            array('id' => '98','user_id' => '17','car_make_id' => '5','car_model_id' => '53','car_body_type_id' => '4','city_id' => '41','fuel_type_id' => '2','cubic_capacity' => '1200','battery_capacity' => NULL,'transmission_id' => '3','description' => 'Car from Germany
Technically very neat
The engine works great
Rust-free, the body is beautiful.
Real mileage, there are services.
The sdk code is, if necessary, we pass a tech inspection.
More information by phone.','year' => '2012','mileage' => '161000','engine_power' => '77','vin' => NULL,'price' => '5350','phone_number' => '60993215','email' => 'a@a','created_at' => '2022-04-06 16:11:33','updated_at' => '2022-04-06 16:11:33'),
            array('id' => '99','user_id' => '17','car_make_id' => '11','car_model_id' => '246','car_body_type_id' => '5','city_id' => '34','fuel_type_id' => '1','cubic_capacity' => '2200','battery_capacity' => NULL,'transmission_id' => '1','description' => 'CAN BE CHECKED AT THE CENTER.
BODY UNDRAWN.
YOU CAN CHECK ANY CAR SERVICE OF YOUR CHOICE.
WE CONSIDER THE CUSTOMER AND INTRODUCE IT TO THE CAR
WE GIVE A TEST DRIVE.
HELPING YOU MANAGE YOUR CAR DOCUMENTS.
A GOOD CAR IS WAITING FOR YOU
THE DESCRIPTION MAY BE INCOMPATIBLE PLEASE EVALUATE VISUALLY
WE ARE NOT RESPONSIBLE FOR NON-COMPLIANCE WITH THE DESCRIPTION.','year' => '2013','mileage' => '200000','engine_power' => '135','vin' => NULL,'price' => '6000','phone_number' => '60994183','email' => 'a@a','created_at' => '2022-04-06 16:13:52','updated_at' => '2022-04-06 16:13:52'),
            array('id' => '100','user_id' => '2','car_make_id' => '70','car_model_id' => '1297','car_body_type_id' => '1','city_id' => '2','fuel_type_id' => '1','cubic_capacity' => '1600','battery_capacity' => NULL,'transmission_id' => '1','description' => 'Very neat Volvo S60 for sale. Extremely economical and powerful enough, the D2 engine works and pulls well, the automatic transmission connects the rails gently, the chassis without noise, the interior is clean and beautiful, the body is unbroken and unpainted. Original mileage with a valid Dutch tech inspection! No pollution tax! Good equipment:
LED daytime running lights;
Leather seats;
Heated seats;
Multifunction steering wheel;
Autopilot;
Navigation;
LCD screen;
Distance sensor system;
City safety system (automatic braking);
CD, AUX, USB;
Start / Stop function;
Genuine Volvo light alloy wheels with good tires;
Two-zone climate control;
Two ignition keys;
The hook and so on.','year' => '2012','mileage' => '250000','engine_power' => '84','vin' => NULL,'price' => '7000','phone_number' => '63239172','email' => 'david@gmail.com','created_at' => '2022-04-06 16:15:35','updated_at' => '2022-04-06 16:15:35'),
            array('id' => '101','user_id' => '2','car_make_id' => '5','car_model_id' => '64','car_body_type_id' => '5','city_id' => '99','fuel_type_id' => '2','cubic_capacity' => '3000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'The car is in good condition.','year' => '2016','mileage' => '62000','engine_power' => '245','vin' => NULL,'price' => '33000','phone_number' => '64738698','email' => 'david@gmail.com','created_at' => '2022-04-06 16:17:46','updated_at' => '2022-04-06 16:17:46'),
            array('id' => '102','user_id' => '2','car_make_id' => '67','car_model_id' => '1242','car_body_type_id' => '5','city_id' => '99','fuel_type_id' => '3','cubic_capacity' => '2500','battery_capacity' => '18','transmission_id' => '1','description' => 'Led lights, distronics, line recognition, city security system, rear view camera, electric luggage, keyless entry system, more powerful audio system, climatronic, heated interior, carplay connection, parking sensors, heated steering wheel, navigation. brand recognition and other
Winter tires','year' => '2020','mileage' => '23000','engine_power' => '163','vin' => NULL,'price' => '32000','phone_number' => '61942111','email' => 'david@gmail.com','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '103','user_id' => '2','car_make_id' => '44','car_model_id' => '866','car_body_type_id' => '5','city_id' => '27','fuel_type_id' => '1','cubic_capacity' => '3000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'MB good condition jeep with air suspension and 7 seats!
FRONT OF THE TRANSITION MODEL!
Body color matte black non-film. Doors are also matte.
Winter tires are good.
Rides softly.
The seats heat up and ventilate.
The wheels are blocked.
Sold because you need a smaller, more compact car.
The automatic transmission works great.
The engine is running smoothly.
The units are all working.','year' => '2007','mileage' => '321000','engine_power' => '165','vin' => NULL,'price' => '8600','phone_number' => '66752065','email' => 'david@gmail.com','created_at' => '2022-04-06 16:21:27','updated_at' => '2022-04-06 16:21:27'),
            array('id' => '104','user_id' => '17','car_make_id' => '8','car_model_id' => '115','car_body_type_id' => '1','city_id' => '27','fuel_type_id' => '2','cubic_capacity' => '2800','battery_capacity' => NULL,'transmission_id' => '1','description' => 'BMW 328i
Line 105k. KM
Body color: Black 2 (668)
M package.
M performance package with interior (carbon)
M steering wheel with rail changeover.
Sport box.
Electric hatch.
HiFi audio equipment.
Parktronics front and rear.
Autopilot.
Rear view camera.
LED headlights.
Wheels with pressure sensors.
New tires.
R18 black glossy rims.
Lubricants, filters replaced.
The body is polished.','year' => '2015','mileage' => '105000','engine_power' => '180','vin' => NULL,'price' => '16500','phone_number' => '68782241','email' => 'a@a','created_at' => '2022-04-06 16:23:39','updated_at' => '2022-04-06 16:23:39'),
            array('id' => '105','user_id' => '17','car_make_id' => '8','car_model_id' => '192','car_body_type_id' => '5','city_id' => '27','fuel_type_id' => '2','cubic_capacity' => '3000','battery_capacity' => NULL,'transmission_id' => '1','description' => 'BMW X5 ALPINE FINISH. Looks exceptional.
M bodykit
Rides perfectly.
Salon in excellent condition.
Very good music with video clips while driving.
The engine is running clean.
Flawless box.
Luggage elevator.
Heated seats.
R20 M wheels.
Back view camera.
Ambient light interior lighting.
Panoramic roof.
Keyless full system.','year' => '2015','mileage' => '216000','engine_power' => '235','vin' => NULL,'price' => '27800','phone_number' => '66752098','email' => 'a@a','created_at' => '2022-04-06 16:25:15','updated_at' => '2022-04-06 16:25:15')
        );
        foreach ($car_listing as $item) {
            DB::table('car_listing')->insert($item);
        }

    }
}
