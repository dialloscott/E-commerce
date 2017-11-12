<?php

use Illuminate\Database\Seeder;
use App\User;
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
        DB::table('users')->delete();
        User::create(
            [
                'name' => 'admin',
                'email' => 'contact@admin.fr',
                'password' => Hash::make('admin'),
                'active' => true,
                'admin' => true
            ]
        );
        User::create(
            [
                'name' => 'lamine',
                'email' => 'contact@lamine.fr',
                'password' => Hash::make('lamine'),
                'active' => true,
            ]
        );
    }
}
