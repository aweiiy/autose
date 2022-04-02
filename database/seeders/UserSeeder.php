<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('id' => '2','name' => 'David','phone_number' => NULL,'email' => 'david@gmail.com','password' => '$2y$10$.g8B8AaUfljL5OKyv44Ble/J5aQApb4ykNsMy3r2/bg/PHcc6N5Yi','city_id' => NULL,'image' => NULL,'role' => '1','created_at' => '2022-03-16 21:36:48','updated_at' => '2022-03-23 21:28:08'),
            array('id' => '10','name' => 'testas','phone_number' => NULL,'email' => 'testas@testas.testas','password' => '$2y$10$HFv0v2xFtkcUuzAoxLbbFOCwZPDCwuprjhsrKsUUo.IpiqH8al3Be','city_id' => NULL,'image' => NULL,'role' => '0','created_at' => '2022-03-17 22:31:52','updated_at' => '2022-03-17 22:31:52'),
            array('id' => '17','name' => 'admin','phone_number' => '62078448','email' => 'a@a','password' => '$2y$10$5WNTheXUzyMB5MxWOySZVuyL5tJSeELHGI4oZjBkUXFW4XVgkgVVq','city_id' => '4','image' => 'admin-1648748710.jpg','role' => '1','created_at' => NULL,'updated_at' => '2022-03-31 17:55:20'),
            array('id' => '21','name' => 'asd','phone_number' => NULL,'email' => 'asd@gmail.com','password' => '$2y$10$urD52G7JwbtVCfec/TfOA.hmHTUGdAvZieL7Z5if6j2YBkeFoNHnu','city_id' => NULL,'image' => NULL,'role' => '0','created_at' => '2022-03-23 21:37:25','updated_at' => '2022-03-23 21:37:25'),
            array('id' => '22','name' => 'asdasdasd','phone_number' => NULL,'email' => 'asadsasd@asd','password' => '$2y$10$TW/L786VGr3v2IbEHjit8uYCj27yqFXYaqeCXKsWx8gsLclXoNrvO','city_id' => NULL,'image' => NULL,'role' => '0','created_at' => '2022-03-23 21:37:46','updated_at' => '2022-03-23 21:37:46'),
            array('id' => '23','name' => 'asdasd','phone_number' => NULL,'email' => 'aaaa@aaa.com','password' => '$2y$10$IpUuzmoPjwOvLN//YWmVK.FxnP6.G92e0GigNyRVbu1Lspus8R/0.','city_id' => NULL,'image' => NULL,'role' => '0','created_at' => '2022-03-25 12:22:37','updated_at' => '2022-03-25 12:22:37'),
            array('id' => '24','name' => 'lol','phone_number' => NULL,'email' => 'lol@lol','password' => '$2y$10$J1yQEd6anPmy.wRZkkrM.O.EckClKME5e2pUmYruT7GAQqJcv2rDy','city_id' => NULL,'image' => NULL,'role' => '0','created_at' => '2022-03-28 17:30:03','updated_at' => '2022-03-28 17:30:03'),
            array('id' => '26','name' => 'aa','phone_number' => '62083111','email' => 'aaa@aa','password' => '$2y$10$jSq2cIZN897xJMC7DMmq/.duoIpX.HkqUsd2YWeDN9DhOPxBMhpPG','city_id' => '16','image' => NULL,'role' => '0','created_at' => '2022-04-01 11:21:06','updated_at' => '2022-04-01 11:22:24'),
            array('id' => '27','name' => 'ass','phone_number' => '62064888','email' => 'ass@gmail.com','password' => '$2y$10$pYbziq38SoAoq2ilnHzl0OiDMrHbvCv4DFzO3hsvIbcxBf1u/PfM.','city_id' => '3','image' => NULL,'role' => '0','created_at' => '2022-04-01 17:17:40','updated_at' => '2022-04-01 17:38:36')
        );

        foreach ($users as $item) {
            DB::table('users')->insert($item);
        }

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
    }
}
