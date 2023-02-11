<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
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
            Product::create([
                'product_name' => $this->generateWord($faker, 3),
                'product_price' => $faker->randomFloat(2, 0, 100)
            ]);
        }
    }

    function generateWord($faker, $minLength) {
        $word = $faker->word();
        while (strlen($word) < $minLength) {
            $word = $faker->word();
        }
        return $word;
    }
}
