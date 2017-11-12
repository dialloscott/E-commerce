<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'Tv'],
            ['name' => 'Computer And Tablets'],
            ['name' => 'Cell Phones'],
            ['name' => 'Audio'],
            ['name' => 'Video Games']
        ]);
    }
}
