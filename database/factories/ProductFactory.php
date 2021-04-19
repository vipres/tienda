<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Provider;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'image' => $this->faker->image('public/storage/image', 640, 480, null, false),
            'sell_price' => $this->faker->numberBetween(3,300),
            'category_id' => Category::all()->random()->id,
            'provider_id' => Provider::all()->random()->id,
        ];
    }
}
