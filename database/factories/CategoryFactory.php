<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;


    /**
     * Configure the model factory.
     *
     * @return $this
     */
    // public function configure()
    // {
    //     return $this->afterMaking(function (Category $category) {
    //         //
    //     })->afterCreating(function (Category $category) {
    //         $category()->posts()->attach(rand(1, 10));
    //     });
    // }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'user_id' => User::factory(),
            'name' => $name,
            'description' => $this->faker->sentence(10),
            'slug' => trim(Str::slug($name)),
        ];
    }
}


