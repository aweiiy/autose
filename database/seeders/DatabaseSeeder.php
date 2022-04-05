<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarMakeSeeder::class,
            CarModelSeeder::class,
            CarBodyTypeSeeder::class,
            FuelTypeSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            TransmissionSeeder::class,
            CarListingSeeder::class,
            ImagesSeeder::class,
            WishlistSeeder::class,

        ]);
    }
}
