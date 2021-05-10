<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::firstOrCreate([
        	'name' => 'Admin',
        	'isAdmin' => true,
        	'email' => 'akejucaleb@gmail.com',
        	'email_verified_at' => now(),
        	'password' => bcrypt('e-commerce-admin'),
        ]);
    }
}
