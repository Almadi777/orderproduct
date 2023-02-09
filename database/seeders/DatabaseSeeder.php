<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            Order::create([
                'order_date' => $faker->date(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'order_amount' => $faker->numberBetween(3000, 5000)
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            Product::create([
                'product_name' => $faker->word(),
                'product_price' => $faker->randomFloat(2, 0, 100)
            ]);
        }
    }
}
