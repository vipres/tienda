<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;


class ProductSeeder extends Seeder
{

     /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }


    public function run()
    {


        $product = Product::create([
            'name' => 'Producto 1',
            'image' => $this->faker->image('public/storage/image', 640, 480, null, false),
            'sell_price' => 10,
            'category_id' => Category::all()->random()->id,
            'provider_id' => Provider::all()->random()->id,
        ]);

        $product->update(['code' => $product->id]);

        $p2 = Product::factory(10)->create();

        foreach($p2 as $p){
            $p->update(['code' => $p->id]);
        }
    }
}
