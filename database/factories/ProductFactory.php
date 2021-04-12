<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;


    /**
     * Configure the model factory.
     *
     * @return $this
     */
    // public function configure()
    // {
    //     return $this->afterMaking(function (Product $product) {
    //         //
    //     })->afterCreating(function (Product $product) {
    //         $product->categories()->attach(rand(1, 10));
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
            'price' => (rand(20, 1000) / 10),
            'quantity' => rand(1, 100),
        ];
    }
}
