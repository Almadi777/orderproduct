<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
                'order_amount' => $faker->numberBetween(3000, 5000),
            ]);
        }
    }
}

