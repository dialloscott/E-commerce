<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        DB::table('brands')->insert([
            ['name' => 'Apple'],
            ['name' => 'Asus'],
            ['name' => 'BlackBerry'],
            ['name' => 'Beats By Dr. Dre'],
            ['name' => 'Bose'],
            ['name' => 'Canon'],
            ['name' => 'Dell'],
            ['name' => 'GoPro'],
            ['name' => 'Hp'],
            ['name' => 'Lenovo'],
            ['name' => 'LG'],
            ['name' => 'Microsoft'],
            ['name' => 'Nikon Cameras'],
            ['name' => 'Panasonic'],
            ['name' => 'Sony'],
            ['name' => 'Samsung'],
            ['name' => 'Toshiba'],
            ['name' => 'Turtle Beach'],
            ['name' => 'EA'],
            ['name' => 'Other']
        ]);

    }
}
