<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('products')->delete();
        Product::create([
            'name' => 'Xbox One - Turtle Beach X-40 Headset',
            'price' => 29.89,
            'quantity' => 1,
            'sku' => 4555656,
            'category_id' => rand(1,5),
            'brand_id'  => rand(1,5),
            'description' => 'demo'
        ]);

        Product::create([
            'name' => 'Xbox One Enx - Elite Controller',
            'price' => 130.00,
            'quantity' => 1,
            'sku' => random_int(0,10),
            'category_id' => rand(1,5),
            'brand_id'  => rand(1,5),
            'description' => 'demo'

        ]);

        Product::create([
            'name' => 'Means Levi Jeans - Dark Blue',
            'price' => 59.89,
            'quantity' => 1,
            'sku' => random_int(0,10),
            'category_id' => rand(1,5),
            'brand_id'  => rand(1,5),
            'description' => 'demo'

        ]);
        Product::create([
            'name' => 'Amble Levi Jeans - Dark Green',
            'price' => 69.89,
            'quantity' => 1,
            'sku' => random_int(0,10),
            'category_id' => rand(1,5),
            'brand_id'  => rand(1,5),
            'description' => 'demo'

        ]);
    }
}
