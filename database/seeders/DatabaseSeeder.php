<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Product::factory(10)->create();
        // \App\Models\Category::factory(10)->create();
         Category::create(['user_id' => 1,
                        'name' => 'Shoes',
                        'description' => 'shoes',
                        'slug' => 'shoes']);

         Category::create(['user_id' => 1,
               'name' => 'Bags',
               'description' => 'bags',
                'slug' => 'bags']);

          Category::create(['user_id' => 1,
               'name' => 'Watches',
               'description' => 'watches',
                'slug' => 'watches']);

           Category::create(['user_id' => 1,
               'name' => 'Tops',
               'description' => 'Tops',
                'slug' => 'tops']); 

         Category::create(['user_id' => 1,
               'name' => 'Knickers',
               'description' => 'knickers',
                'slug' => 'knickers']);

    }
}
