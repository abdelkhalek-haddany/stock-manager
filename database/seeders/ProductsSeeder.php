<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('products')->insert([
                'user_id' => 1,
                'name' => $faker->word(),
                'quantity_in_stock' => $faker->numberBetween(1, 200),
                'minimum_stock' => $faker->numberBetween(5, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
