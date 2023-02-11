<?php

namespace Database\Seeders;

use App\Models\Order;
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
                'order_date' => date('Y-m-d', strtotime('07/07/2020')),
                'phone' => "+7 " . $faker->numerify("### ### ## ##"),
                'email' => $faker->email(),
                'order_amount' => $faker->numberBetween(3000, 5000)
            ]);
        }
    }
}
